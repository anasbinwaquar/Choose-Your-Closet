$(function() {
    const form = document.querySelector('#ProductForm');
    const checkboxes = form.querySelectorAll('input[type=checkbox]');
    const checkboxLength = checkboxes.length;
    const firstCheckbox = checkboxLength > 0 ? checkboxes[0] : null;
    function init() {
        if (firstCheckbox) {
            for (let i = 0; i < checkboxLength; i++) {
                checkboxes[i].addEventListener('change', checkValidity);
            }
            checkValidity();
        }
    }
    function isChecked() {
        for (let i = 0; i < checkboxLength; i++) {
            if (checkboxes[i].checked) return true;
        }
        return false;
    }
    function checkValidity() {
        const errorMessage = !isChecked() ? 'At least one checkbox must be selected.' : '';
        firstCheckbox.setCustomValidity(errorMessage);
    }
    function TextboxCheck(){	
		const quantitiycheckbox = document.querySelectorAll('input[class=quantitiy]');
		const prodform = document.querySelector('#ProductForm');
		const checkboxes = prodform.querySelectorAll('input[type=checkbox]');
    }

    init();
})();

