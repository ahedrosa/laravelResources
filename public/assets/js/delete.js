

(function () {
    
    //delete1
    let formulariosBorrar = document.getElementsByClassName('deleteForm');
    for(var i = 0; i < formulariosBorrar.length; i++) {
    formulariosBorrar[i].addEventListener('submit', function(event) {
        let retVal = confirm('Delete?');
            if(!retVal) {
                event.preventDefault();
            }
        });
    }
})();