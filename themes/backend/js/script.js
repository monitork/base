function check_all(e) {
    if (e.checked) { // check select status
        $('.check_item').each(function () { //loop through each checkbox
            this.checked = true;  //select all checkboxes with class "checkbox1"
        });
    } else {
        $('.check_item').each(function () { //loop through each checkbox
            this.checked = false; //deselect all checkboxes with class "checkbox1"
        });
    }
}
