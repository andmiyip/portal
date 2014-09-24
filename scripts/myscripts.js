function submitform()
{
  document.myform.submit();
}

function submitform2()
{
  document.myform2.submit();
}

function CreateJobDo()
{
if($('input:radio:checked').length > 0)
{
alert('One of the radio buttons is no!');
}else{
alert('One of the radio buttons is yes!');
}
}

$('#form1').submit(function() {
    if ($('input:checkbox', this).is(':checked') &&
        $('input:radio', this).is(':checked')) {
        // everything's fine...
    } else {
        alert('Please select something!');
        return false;
    }
});