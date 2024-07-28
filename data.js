    function validate_form ( )
{
	valid = true;

        if ( document.contact_form.imya.value == "" )
        {
                alert ( "Пожалуйста введите Ваше имя" );
                valid = false;
        }
    
        if ( document.contact_form.therap.selectedIndex == 0 )
        {
                alert ( "Пожалуйста, выберите процедуру" );
                valid = false;
        }

    return valid;

}
