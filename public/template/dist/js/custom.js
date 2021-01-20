$(function () {

    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    "use strict";

    // Feather Icon Init Js
    feather.replace();

    $(".preloader").fadeOut();

    // this is for close icon when navigation open in mobile view
    $(".nav-toggler").on('click', function () {
        $("#main-wrapper").toggleClass("show-sidebar");
        $(".nav-toggler i").toggleClass("ti-menu");
    });

    // ==============================================================
    // Right sidebar options
    // ==============================================================
    $(function () {
        $(".service-panel-toggle").on('click', function () {
            $(".customizer").toggleClass('show-service-panel');

        });
        $('.page-wrapper').on('click', function () {
            $(".customizer").removeClass('show-service-panel');
        });
    });

    // ==============================================================
    //tooltip
    // ==============================================================
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
    // ==============================================================
    //Popover
    // ==============================================================
    $(function () {
        $('[data-toggle="popover"]').popover()
    })

    // ==============================================================
    // Perfact scrollbar
    // ==============================================================
    $('.message-center, .customizer-body, .scrollable, .scroll-sidebar').perfectScrollbar({
        wheelPropagation: !0
    });

    // ==============================================================
    // Resize all elements
    // ==============================================================
    $("body, .page-wrapper").trigger("resize");
    $(".page-wrapper").delay(20).show();
    // ==============================================================
    // To do list
    // ==============================================================
    $(".list-task li label").click(function () {
        $(this).toggleClass("task-done");
    });

    // ==============================================================
    // This is for the innerleft sidebar
    // ==============================================================
    $(".show-left-part").on('click', function () {
        $('.left-part').toggleClass('show-panel');
        $('.show-left-part').toggleClass('ti-menu');
    });

    // For Custom File Input
    $('.custom-file-input').on('change', function () {
        //get the file name
        var fileName = $(this).val();
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
    })




    $('.btn-edit').on('click', function(){
        let id = $(this).data('id');
        $.ajax({
            url:`/users/${id}/edit`,
            method: "GET",
            success:function(data){

                $('#modal-edit').find('.modal-content').html(data);
                $('#modal-edit').modal('show');
            },
            error:function(error){
                console.log(error)
            }
        })
    });



    // JAVASCRIPT DOMAIN
    // Tambah Domain
    $('.btn-add-domain').click(function(){
        $('#btn-simpan-domain').val("simpan").html('<i class="fas fa-save mr-2"></i> Simpan');
        $('#id_domain').val('');
        $('#form-tambah-domain').trigger("reset");
        $('#modal-judul').html("Tambah Domain");
        $('#modal-tambah-domain').modal('show');

        $('#btn-simpan-domain').click(function(e){
            e.preventDefault();
            const form_data = $('#form-tambah-domain').serialize();
            const a = $(this).parent();

            $.ajax({
                method:'POST',
                url:`/domains`,
                data:form_data,
                success: function(data){
                    $('#modal-tambah-domain').modal('hide');

                    iziToast.show({
                        theme: 'dark',
                        icon: 'far fa-check-circle',
                        iconColor: 'rgb(0, 255, 184)',
                        title: data.nama_domain,
                        message: ' Berhasil ditambahkan',
                        position: 'center',
                        progressBarColor: 'rgb(0, 255, 184)',
                        buttons: [
                            ['<button class="btn btn-success">Refresh</button>', function (instance, toast) {
                                window.location.assign('/indikators/create');
                            }, true],
                        ],
                    });
                },
                error:function(error){
                    const errors = error.responseJSON.errors;
                    const firstItem = Object.keys(errors)[0]
                    const firstItemDOM = document.getElementById(firstItem)
                    const firstErrorMessage = errors[firstItem][0]

                    console.log(firstErrorMessage);

                    clearErrors()
                    // show the error message
                    firstItemDOM.insertAdjacentHTML('afterend', `<span class="invalid-feedback" role="alert">${firstErrorMessage}</span>`)

                    // highlight the form control with the error
                    firstItemDOM.classList.add('border', 'border-danger','is-invalid')
                }
            });
        });
    });
    // Akhir Tambah Domain


    // Event Change Domain
    $(document).on('change','#domain_id', function () {
        let id =  $(this).val();
        let a = $(this).parent();

        $.ajax({
            type:'get',
            url:`/findKetDomain`,
            data:{'id':id},
            dataType:'json',
            success: function(data) {
                a.find('#ket_domain').val(data.ket_domain);
                $('.btn-edit-domain').prop('disabled', false);
                $('.btn-hapus-domain').prop('disabled', false);
            },
            error:function(){

            }
        });
    });
    // Akhir Event Change Domain


    // Edit Domain
    $('.btn-edit-domain').click(function(){
        let id = $('#domain_id').val();
        console.log(id);
        let a = $(this).parent();

        $.ajax({
            method:'GET',
            url:`/domains/${id}/edit`,
            dataType:'json',
            success: function(data){
                $('#modal-edit-domain').modal('show');
                $('#id_domain').val(data.id);
                $('#nama_domain_edit').val(data.nama_domain);
                $('#ket_domain_edit').val(data.ket_domain);
            },
            error:function(){
                console.log('error');
            }
        })
    });
    // Akhir Edit Domain

    // Update Domain
    $('.btn-update').click(function(){
        let id = $('#form-edit').find('#id_domain').val();
        let form_data = $('#form-edit').serialize();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:`/domains/${id}`,
            method:'PATCH',
            data:form_data,
            success: function(data){
                $('#modal-edit-domain').modal('hide');

                console.log(data);
                iziToast.show({
                    theme: 'dark',
                    icon: 'far fa-check-circle',
                    iconColor: 'rgb(0, 255, 184)',
                    title: data.nama_domain,
                    message: ' Berhasil diperbarui',
                    position: 'center',
                    progressBarColor: 'rgb(0, 255, 184)',
                    buttons: [
                        ['<button class="btn btn-success">Refresh</button>', function (instance, toast) {
                            window.location.assign('/indikators/create');
                        }, true],
                    ],
                });

            },
            error:function(error){
                console.log(error)
            }
        })
    });
    // Akhir Update Domain

    // Hapus Domain
    $('.btn-hapus-domain').click(function(){
        const id = $('#domain_id').val();
        console.log(id);

        Swal.fire({
            title: 'Anda Yakin Hapus?',
            text: "Data yang sudah dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url:`/domains/${id}`,
                    method:'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data){
                        console.log('Berhasil dihapus');
                        Swal.fire(
                            'Berhasil dihapus!',
                            'User '+data.nama_domain+' terhapus',
                            'success'
                        )
                        window.location.assign('/indikators/create');

                    },
                    error: function(error){
                        console.log(error);
                    }
                });
            }
        });
    });
    // Akhir Hapus Domain


    // JAVASCRIPT ASPEK
    $('.btn-add-aspek').click(function(){
        $('#btn-simpan-aspek').val("simpan").html('<i class="fas fa-save mr-2"></i> Simpan');
        $('#id_domain').val('');
        $('#form-tambah-aspek').trigger("reset");
        $('#modal-judul-aspek').html("Tambah Aspek");
        $('#modal-tambah-aspek').modal('show');

        $('#btn-simpan-aspek').click(function(){
            const form_data = $('#form-tambah-aspek').serialize();
            $.ajax({
                method:'POST',
                url:`/aspeks`,
                data:form_data,
                success: function(data){
                    $('#modal-tambah-aspek').modal('hide');

                    iziToast.show({
                        theme: 'dark',
                        icon: 'far fa-check-circle',
                        iconColor: 'rgb(0, 255, 184)',
                        title: data.nama_aspek,
                        message: ' Berhasil ditambahkan',
                        position: 'center',
                        progressBarColor: 'rgb(0, 255, 184)',
                        buttons: [
                            ['<button class="btn btn-success">Refresh</button>', function (instance, toast) {
                                window.location.assign('/indikators/create');
                            }, true],
                        ],
                    });
                },
                error:function(error){
                    const errors = error.responseJSON.errors;
                    const firstItem = Object.keys(errors)[0]
                    const firstItemDOM = document.getElementById(firstItem)
                    const firstErrorMessage = errors[firstItem][0]

                    console.log(firstErrorMessage);

                    clearErrors()
                    // show the error message
                    firstItemDOM.insertAdjacentHTML('afterend', `<span class="invalid-feedback" role="alert">${firstErrorMessage}</span>`)

                    // highlight the form control with the error
                    firstItemDOM.classList.add('border', 'border-danger','is-invalid')
                }
            });

        });
    });




    $(document).on('change','#aspek_id', function () {
        let id =  $(this).val();
        let a = $(this).parent();

        $.ajax({
            type:'get',
            url:`/findKetAspek`,
            data:{'id':id},
            dataType:'json',
            success: function(data) {
                a.find('#ket_aspek').val(data.ket_aspek);
                $('.btn-edit-aspek').prop('disabled', false);
                $('.btn-hapus-aspek').prop('disabled', false);
            },
            error:function(){
            }
        });
    });


    $('.btn-edit-aspek').click(function(){
        let id = $('#aspek_id').val();
        console.log(id);
        let a = $(this).parent();

        $.ajax({
            method:'GET',
            url:`/aspeks/${id}/edit`,
            dataType:'json',
            success: function(data){
                $('#modal-edit-aspek').modal('show');
                $('#id_aspek').val(data.id);
                $('#nama_aspek_edit').val(data.nama_aspek);
                $('#ket_aspek_edit').val(data.ket_aspek);
            },
            error:function(){
                console.log('error');
            }
        })
    });

    $('.btn-update-aspek').click(function(){
        const id = $('#form-edit-aspek').find('#id_aspek').val();
        const form_data = $('#form-edit-aspek').serialize();

        console.log(form_data);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:`/aspeks/${id}`,
            method:'PATCH',
            data:form_data,
            success: function(data){
                $('#modal-edit-aspek').modal('hide');

                iziToast.show({
                    theme: 'dark',
                    icon: 'far fa-check-circle',
                    iconColor: 'rgb(0, 255, 184)',
                    title: data.nama_aspek,
                    message: ' Berhasil diperbarui',
                    position: 'center',
                    progressBarColor: 'rgb(0, 255, 184)',
                    buttons: [
                        ['<button class="btn btn-success">Refresh</button>', function (instance, toast) {
                            window.location.assign('/indikators/create');
                        }, true],
                    ],
                });
            },
            error:function(error){
                console.log(error)
            }
        })
    });


    $('.btn-hapus-aspek').click(function(){
        let id = $('#aspek_id').val();
        console.log(id);

        Swal.fire({
            title: 'Anda Yakin Hapus?',
            text: "Data yang sudah dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url:`/aspeks/${id}`,
                    method:'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data){
                        console.log('Berhasil dihapus');
                        $('#modal-hapus-aspek').modal('hide');
                        Swal.fire(
                            'Berhasil dihapus!',
                            'User '+data.nama_aspek+' terhapus',
                            'success'
                        )
                        window.location.assign('/indikators/create');

                    },
                    error: function(error){
                        console.log(error);
                    }
                });
            }
        });
    });


    $('.btn-hapus-indikator').click(function(){
        let id =$(this).attr('data-id');
        console.log(id);
        $('#modal-hapus-indikator').modal('show');

        $('#batal-indikator').click(function(){
            $('#modal-hapus-indikator').modal('hide');
        })

        $('#hapus-indikator').click(function(){
            $.ajax({
                url:`/indikators/${id}`,
                method:'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(){
                    console.log('Berhasil dihapus');
                    $('#modal-hapus-indikator').modal('hide');
                    window.location.assign('/indikators');

                },
                error: function(error){
                    console.log(error);
                }
            });
        });
    });


// =============================================================
//               Javascript Multisteps modal
// =============================================================

$(".tabs").click(function(){

    $(".tabs").removeClass("active");
    $(".tabs h6").removeClass("font-weight-bold");
    $(".tabs h6").addClass("text-muted");
    $(this).children("h6").removeClass("text-muted");
    $(this).children("h6").addClass("font-weight-bold");
    $(this).addClass("active");

    current_fs = $(".active");

    next_fs = $(this).attr('id');
    next_fs = "#" + next_fs + "1";

    $("fieldset").removeClass("show");
    $(next_fs).addClass("show");

        current_fs.animate({}, {
            step: function() {
                current_fs.css({
                'display': 'none',
                'position': 'relative'
                });
                next_fs.css({
                'display': 'block'
                });
            }
        });
    });


});


function clearErrors() {
    // remove all error messages
    const errorMessages = document.querySelectorAll('.text-danger')
    errorMessages.forEach((element) => element.textContent = '')
    // remove all form controls with highlighted error text box
    const formControls = document.querySelectorAll('.form-control')
    formControls.forEach((element) => element.classList.remove('border', 'border-danger', 'is-invalid'))
}


// =============================================================
//               Javascript Multisteps input form
// =============================================================
const DOMstrings = {
    stepsBtnClass: 'multisteps-form__progress-btn',
    stepsBtns: document.querySelectorAll(`.multisteps-form__progress-btn`),
    stepsBar: document.querySelector('.multisteps-form__progress'),
    stepsForm: document.querySelector('.multisteps-form__form'),
    stepsFormTextareas: document.querySelectorAll('.multisteps-form__textarea'),
    stepFormPanelClass: 'multisteps-form__panel',
    stepFormPanels: document.querySelectorAll('.multisteps-form__panel'),
    stepPrevBtnClass: 'js-btn-prev',
    stepNextBtnClass: 'js-btn-next' };


const removeClasses = (elemSet, className) => {
    elemSet.forEach(elem => {
        elem.classList.remove(className);
    });
};

const findParent = (elem, parentClass) => {
    let currentNode = elem;
    while (!currentNode.classList.contains(parentClass)) {
        currentNode = currentNode.parentNode;
    }
    return currentNode;
};

const getActiveStep = elem => {
    return Array.from(DOMstrings.stepsBtns).indexOf(elem);
};

const setActiveStep = activeStepNum => {
removeClasses(DOMstrings.stepsBtns, 'js-active');
    DOMstrings.stepsBtns.forEach((elem, index) => {

        if (index <= activeStepNum) {
            elem.classList.add('js-active');
        }
    });
};

  const getActivePanel = () => {

    let activePanel;

    DOMstrings.stepFormPanels.forEach(elem => {

      if (elem.classList.contains('js-active')) {

        activePanel = elem;

      }

    });

    return activePanel;

  };

  const setActivePanel = activePanelNum => {

    removeClasses(DOMstrings.stepFormPanels, 'js-active');

    DOMstrings.stepFormPanels.forEach((elem, index) => {
      if (index === activePanelNum) {

        elem.classList.add('js-active');

        setFormHeight(elem);

      }
    });

  };

  const formHeight = activePanel => {

    const activePanelHeight = activePanel.offsetHeight;

    DOMstrings.stepsForm.style.height = `${activePanelHeight}px`;

  };

  const setFormHeight = () => {
    const activePanel = getActivePanel();

    formHeight(activePanel);
  };

  DOMstrings.stepsBar.addEventListener('click', e => {

    const eventTarget = e.target;

    if (!eventTarget.classList.contains(`${DOMstrings.stepsBtnClass}`)) {
      return;
    }

    const activeStep = getActiveStep(eventTarget);

    setActiveStep(activeStep);

    setActivePanel(activeStep);
  });

  DOMstrings.stepsForm.addEventListener('click', e => {

    const eventTarget = e.target;

    if (!(eventTarget.classList.contains(`${DOMstrings.stepPrevBtnClass}`) || eventTarget.classList.contains(`${DOMstrings.stepNextBtnClass}`)))
    {
      return;
    }

    const activePanel = findParent(eventTarget, `${DOMstrings.stepFormPanelClass}`);

    let activePanelNum = Array.from(DOMstrings.stepFormPanels).indexOf(activePanel);

    if (eventTarget.classList.contains(`${DOMstrings.stepPrevBtnClass}`)) {
      activePanelNum--;

    } else {

      activePanelNum++;

    }

    setActiveStep(activePanelNum);
    setActivePanel(activePanelNum);

  });

  window.addEventListener('load', setFormHeight, false);

  window.addEventListener('resize', setFormHeight, false);


  const setAnimationType = newType => {
    DOMstrings.stepFormPanels.forEach(elem => {
      elem.dataset.animation = newType;
    });
  };

  //changing animation
  const animationSelect = document.querySelector('.pick-animation__select');

//   animationSelect.addEventListener('change', () => {
//     const newAnimationType = animationSelect.value;

//     setAnimationType(newAnimationType);
//   });


// $(document).ready(function() {
//     $("#input-704").fileinput({
//         allowedFileExtensions: ['jpg', 'png', 'gif'],
//         uploadUrl:  "/file-upload-batch/2",
//         uploadAsync: false,
//         overwriteInitial: false,
//         minFileCount: 1,
//         maxFileCount: 5,
//         initialPreviewAsData: true // identify if you are sending preview data only and not the markup
//     });
// });
