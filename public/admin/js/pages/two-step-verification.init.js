/*
Template Name: Steex - Admin & Dashboard Template
Author: Themesbrand
Website: https://Themesbrand.com/
Contact: Themesbrand@gmail.com
File: Two step verification Init Js File
*/

// move next
function getInputElement(index) {
    return document.getElementById('digit' + index + '-input');
}
function moveToNext(index, event) {
    const eventCode = event.which || event.keyCode;
    console.log(eventCode);
    const input = getInputElement(index);
    // console.log(input);
    if (input.value.length === 2) {
        if (index !== 7 || index !== 17) {
            getInputElement(index + 1).focus();
        } else {
            input.blur();
        }
    }
    if (eventCode === 8 && input.value.length == 0 && (index !== 1 || index !== 11)) {
        getInputElement(index - 1).focus();
    }
}
