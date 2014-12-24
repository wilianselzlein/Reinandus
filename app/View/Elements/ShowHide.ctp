<script language="Javascript" type="text/javascript">
function ShowHide (OPTION, ID) {
	if (document.getElementById(OPTION + 'td' + ID).style.display == "none") {
		document.getElementById(OPTION + 'td' + ID).style.display= "";
	}
	else {
		document.getElementById(OPTION + 'td' + ID).innerHTML= "";
		document.getElementById(OPTION + 'jx' + ID).style.display= "";
		document.getElementById(OPTION + 'bt' + ID).style.display= "none";
	}
}
</script>