<?php

namespace App\Http\Controllers;

use App\Http\Resources\MyCircleResultsResource;
use App\Models\GroupMembers;
use Exception;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Illuminate\Support\Facades\Response;

class ExportController extends Controller
{
    //

    private $sheet;


    public function GetNextField($sheet1, $row = 1)
    {
        $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($sheet1->getHighestColumn($row));
        for ($i = $highestColumnIndex + 1;; $i++) {
            $currentColumnName = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($i);
            $ReturnValue = $currentColumnName;
            break;
        }
        return $ReturnValue;
    }
    public function export_results(Request $request, $id)
    {
        try {
            // dd($id);
            MyCircleResultsResource::withoutWrapping();
            $circle_id = $id;
            $groupMembers = GroupMembers::where('circle_id', $circle_id)->with(['user' => ['draw_numbers' => function (Builder $query) use ($circle_id) {
                $query->where('circle_id', $circle_id);
            }], 'circle'])->get();
            $res = MyCircleResultsResource::collection($groupMembers)->response()->getData(true);
            // dd($res);
            // $file = $this->array_to_excel($res);
            $spreadsheet = new Spreadsheet();

            // Retrieve the current active worksheet 
            $sheet = $spreadsheet->getActiveSheet();

            $this->sheet = $sheet;

            $center_style = array(
                'alignment' => [
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ]
            );

            // dd($data);

            $sheet->setCellValue('A1', 'space')->getStyle('A1')->getFont()->getColor()->setARGB("FFFFFFFF");
            $writer = new Xlsx($spreadsheet);

            $file = sprintf(
                '%s-%s',
                'excel-export',
                time()
            );

            $filename = storage_path("app/public/results/excels/$file.xlsx");

            $writer->save($filename);

            $path = storage_path("app\public\\results\\excels\\$file.xlsx");
            // dd($path);

            // $file_name_url = url("files/$file.xlsx");

            // return $file_name_url;
            $headers = ['Access-Control-Allow-Headers' => 'Content-Type, Accept, Authorization, X-Requested-With, Application'];
            return Response::download($path, $file, $headers);
            // foreach ($res as $value) {
            //     dd($value);
            // }
            // return $file;
        } catch (Exception $e) {
            Log::error($e);
            dd($e);
            // return response()->json();
        }
    }

    public function array_to_excel($data)
    {
        try {
            extract($data);
            // Creates New Spreadsheet 
            $spreadsheet = new Spreadsheet();

            // Retrieve the current active worksheet 
            $sheet = $spreadsheet->getActiveSheet();

            $this->sheet = $sheet;

            $center_style = array(
                'alignment' => [
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ]
            );

            // dd($data);

            $sheet->setCellValue('A1', 'space')->getStyle('A1')->getFont()->getColor()->setARGB("FFFFFFFF");
            $writer = new Xlsx($spreadsheet);

            $file = sprintf('%s-%s', 'excel-export', time());

            $filename = storage_path("app/public/results/excels/$file.xlsx");

            $writer->save($filename);

            $path = storage_path("app\public\\results\\excels\\$file.xlsx");
            // dd($path);

            // $file_name_url = url("files/$file.xlsx");

            // return $file_name_url;
            return Response::download($path, $file);
            // if (file_exists($path)) {
            //     // return true;
            //     // dd(true);
            //     return response()->download($path);
            // }
        } catch (Exception $e) {
            Log::error($e);
        }
    }
}
