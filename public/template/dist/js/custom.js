$(function () {
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

    $('.btn-add-user').on('click', function(){
        $('#modal-add-user').modal('show');

        $('.btn-save-user').click(function(){
            const form_data = $('#form-add-user').serialize();
            const a = $(this).parent();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method:'POST',
                url:`/users`,
                data:form_data,
                success: function(data){
                    $('#modal-add-user').modal('hide');
                    if ($('#role').val() == 'user') {
                        window.location.assign('/users-dinas');
                    } else {
                        window.location.assign('/users');
                    }
                },
                error:function(error){
                    const data = error.responseJSON;

                    $('#name').addClass('is-invalid');
                    $('#name_error').text(data.errors.name);
                    $('#username').addClass('is-invalid')
                    $('#username_error').text(data.errors.username);
                    $('#modal-add-domain').modal('show');
                    $('#email').addClass('is-invalid');
                    $('#email_error').text(data.errors.email);
                    $('#role').addClass('is-invalid')
                    $('#role_error').text(data.errors.role);
                    $('#modal-add-domain').modal('show');
                    $('#password').addClass('is-invalid');
                    $('#password_error').text(data.errors.password);
                    $('#password_confirm').addClass('is-invalid')
                    $('#password_confirm_error').text(data.errors.password_confirmation);
                    $('#modal-add-domain').modal('show');
                }
            });
        });
    });


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

    $('#btn-hapus-user').on('click', function(event){
        event.preventDefault();
        const id = $('#btn-hapus-user').data('id');
        const nama = $('#btn-hapus-user').data('nama');
        const role = $('#btn-hapus-user').data('role');

        Swal.fire({
            title: 'Anda Yakin hapus user </br>'+nama+'?',
            text: "Data yang sudah dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type:'DELETE',
                    url:`/users/${id}`,
                    success:function(){
                        console.log('data sudah berhasil dihapus');
                        Swal.fire(
                            'Berhasil dihapus!',
                            'User '+nama+' terhapus',
                            'success'
                        )

                        console.log(role);
                        if (role === 'user') {
                            window.location.assign('/users-dinas');
                        } else {
                            window.location.assign('/users');
                        }

                    },
                    error:function(error){
                        console.log(error);
                    }
                });


            }
        })
    })

    $('.btn-add-domain').click(function(){
        $('#modal-add-domain').modal('show');

        $('.btn-save-domain').click(function(e){
            e.preventDefault();
            const form_data = $('#form-add-domain').serialize();
            const a = $(this).parent();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method:'POST',
                url:`/domains`,
                data:form_data,
                success: function(data){
                    $('#modal-add-domain').modal('hide');
                    window.location.assign('/indikators/create');
                },
                error:function(error){
                    const data = error.responseJSON;

                    console.log(data.errors.nama_domain);

                    $('#nama_domain').addClass('is-invalid');
                    $('#nama_domain_error').text(data.errors.nama_domain);
                    $('#ket_domain').addClass('is-invalid')
                    $('#ket_domain_error').text(data.errors.ket_domain);
                    $('#modal-add-domain').modal('show');
                }
            });
        });
    });


    $('.btn-add-aspek').click(function(){
        $('#modal-add-aspek').modal('show');

        $('.btn-save-aspek').click(function(){
            const form_data = $('#form-add-aspek').serialize();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method:'POST',
                url:`/aspeks`,
                data:form_data,
                success: function(data){
                    $('#modal-add-aspek').modal('hide');
                },
                error:function(error){
                    const data = error.responseJSON;

                    console.log(data.errors.nama_aspek);

                    $('#nama_aspek').addClass('is-invalid');
                    $('#nama_aspek_error').text(data.errors.nama_aspek);
                    $('#ket_aspek').addClass('is-invalid')
                    $('#ket_aspek_error').text(data.errors.ket_aspek);
                    $('#modal-add-aspek').modal('show');
                }
            });
        });
    });

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
                window.location.assign('/indikators/create');
                $('#ket_domain_edit').val(data.ket_domain);
            },
            error:function(error){
                console.log(error)
            }
        })
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
        let id = $('#form-edit-aspek').find('#id_aspek').val();
        let form_data = $('#form-edit-aspek').serialize();
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
                window.location.assign('/indikators/create');
                $('#ket_aspek_edit').val(data.ket_aspek);
            },
            error:function(error){
                console.log(error)
            }
        })
    });


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
                    success: function(){
                        console.log('Berhasil dihapus');
                        window.location.assign('/indikators/create');

                    },
                    error: function(error){
                        console.log(error);
                    }
                });
            }
        });
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
                    success: function(){
                        console.log('Berhasil dihapus');
                        $('#modal-hapus-aspek').modal('hide');
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
            })
        })
    })
});


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
