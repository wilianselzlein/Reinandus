/*
* Função para limpar o cache do bootsrap modal
*/

$('body').on('hidden.bs.modal', '.modal', function () {
	$(this).removeData('bs.modal');
});