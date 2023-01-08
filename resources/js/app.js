import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone("#dropzone",{
    dictDefaultMessage: 'Sube aquí tu imagen',
    acceptedFiles: ".png,.jpg,.jpeg,.gif",
    addRemoveLinks: true,
    dictRemoveFile:"Borrar archivo",
    maxFiles: 1,
    uploadMultiple: false,
    init: function (){
        //Recuperar la ultima imagen subida

        if(document.querySelector('[name="imagen"]').value.trim()){
            //Si hay un nombre de imagen perspectiveOrigin: 
            const imagenPublicada = {}
            imagenPublicada.size = 1234;
            imagenPublicada.name = document.querySelector('[name="imagen"]').value;

            this.options.addedfile.call(this,imagenPublicada);
            this.options.thumbnail.call(this,imagenPublicada,`/uploads/${imagenPublicada.name}`)
            
            imagenPublicada.previewElement.classList.add('dz-success','dz-complete')
        }
    }
})

dropzone.on("sending", function(file,xhr,formData){
    console.log(file)
});

dropzone.on("success", (file,response) => { 
    //Al cargarse la imagen en el servidor
    console.log(response.imagen);
    document.querySelector('[name="imagen"]').value = response.imagen;
});

dropzone.on("error", (file,message) => { 
    console.log(message);
});

dropzone.on("removedfile", (file,message) => { 
    console.log("Archivo eliminado");
    document.querySelector('[name="imagen"]').value = '';
});