$(document).ready(function () {

    /* Preloader */
    $('.preloader').fadeOut('slow', function () {
        $(this).remove();
    });

    /* Login */
    $('#loginBtn').click(function () {
        var active = true;
        username = $('#inputUsername').val();
        password = $('#inputPassword').val();
        if (username == "") {
            $('#inputUsername').addClass('is-invalid');
            active = false;
        }
        if (password == "") {
            $('#inputPassword').addClass('is-invalid');
            active = false;
        }
        if (active) {
            $.ajax({
                url: 'session_start.php',
                type: 'POST',
                data: {
                    login: true,
                    username: username,
                    password: password
                },
                success: function (data) {
                    if (data) {
                        window.location.href = "index.php";
                    } else {
                        $("#error").html("<span style='color:#cc0000'>Usuario y/o contraseña incorrectos.</span>");
                    }
                }
            })
        } else {
            $("#error").html("<span style='color:#cc0000'>Ingrese un usuario y/o contraseña.</span>");
        }
    });

    $('#signupBtn').click(function () {
        name = $('#inputName').val();
        lastname = $('#inputLastName').val();
        birthdate = $('#birthdate').val();
        gender = $('#gender').val();
        cellphone = $('#cellphone').val();
        username = $('#username').val();
        email = $('#inputEmail').val();
        password = $('#inputPassword').val();

        console.log(name + " " + lastname + " " + birthdate + " " + gender + " " + cellphone + " " + username + " " + email + " " + password);
        $.ajax({
            url: 'queryInsert.php',
            type: 'POST',
            data: {
                signup: true,
                name: name,
                lname: lastname,
                date: birthdate,
                gender: gender,
                phone: cellphone,
                user: username,
                email: email,
                pass: password
            },
            success: function (data) {
                if (data == 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Registro exitoso',
                        text: 'Te has registrado correctamente.'
                    })
                }
            }
        })
    });

    if ($('#displayGames').length > 0) {
        $.ajax({
            url: 'querySelect.php',
            type: 'POST',
            data: { getGames: true },
            success: function (r) {
                $('#displayGames').html(r);
            }
        })
    }

    if ($('#displayMyTournaments').length > 0) {
        $.ajax({
            url: 'querySelect.php',
            type: 'POST',
            data: { getMyT: true },
            success: function (r) {
                $('#displayMyTournaments').html(r);
            }
        })
    }

    if ($('#getHistory').length > 0) {
        $.ajax({
            url: 'querySelect.php',
            type: 'POST',
            data: { getHistory: true },
            success: function (r) {
                $('#getHistory').html(r);
            }
        })
    }


    if ($('#my-profile').length > 0) {
        $.ajax({
            url: 'querySelect.php',
            type: 'POST',
            data: {
                getProfile: true
            },
            success: function (r) {
                $('#my-profile').html(r);
            }
        })
    }

    editProfile = function () {
        $('.form-field').prop('readonly', false);
        $('#editProfile').html("Actualizar perfil");
        $("#editProfile").attr("onclick", "updateProfile()");
        $('#editProfile').css("background-color", '#5d85ff');

    };

    $("ul").on('click','#pop',function () {
        $('#myModal').modal('show'); 
    });

    updateProfile = function () {
        name = $('#name').val();
        lname = $('#lname').val();
        date = $('#date').val();
        gender = $('#gender').val();
        youtube = $('#yt').val();
        twitter = $('#tt').val();
        facebook = $('#fb').val();
        twitch = $('#tw').val();
        mixer = $('#mx').val();
        if (name == '' || lname == '' || date == '' || gender == '') {
            Swal.fire({
                icon: 'error',
                title: 'Campos faltantes',
                text: 'Faltaron campos por llenar. Los campos marcados con "*" son obligatorios.'
            })
        } else {
            $.ajax({
                url: 'queryInsert.php',
                type: 'POST',
                data: {
                    updateUser: true,
                    name: name,
                    lname: lname,
                    date: date,
                    gender: gender,
                    youtube: youtube,
                    twitter: twitter,
                    facebook: facebook,
                    twitch: twitch,
                    mixer: mixer
                }, success: function (data) {
                    $('.form-field').prop('readonly', true);
                    $('#editProfile').css("background-color", '#e23e57');
                    if (data == 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Datos actualizados',
                            text: 'Sus datos se han actualizado de manera correcta.'
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error al actualizar',
                            text: 'Ha habido un error a la hora de actualizar los datos, vuelva a intentarlo.'
                        })
                    }
                }
            });
        }
    };

    signin = function (id) {
        $.ajax({
            url: 'queryInsert.php',
            type: 'POST',
            data: {
                signin: true,
                id: id
            },
            success: function (data) {
                $('#exampleModalCenter').modal('toggle');
                if (data == 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Inscripción anulada',
                        text: 'Necesita iniciar sesión en el sitio para poder inscribirse a un torneo.'
                    })
                } else if (data == 1) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Inscripción exitosa',
                        text: 'Usted ha sido agregado a la lista de participantes del torneo. ¡Buena suerte!'
                    })
                }
            }
        })
    }

    moreInfo = function (id) {
        $.ajax({
            url: 'querySelect.php',
            type: 'POST',
            data: {
                getTournament: true,
                id: id
            },
            success: function (r) {
                $('tournamentModal').empty();
                $('#tournamentModal').html(r);
                $('#exampleModalCenter').modal('show');
            }
        })
    }

    if ($('#displayTournaments').length > 0) {
        $.ajax({
            url: 'querySelect.php',
            type: 'POST',
            data: { getTournaments: true },
            success: function (r) {
                $('#displayTournaments').html(r);
            }
        })
    }

    updatePhoto = function () {
        formdata=new FormData(document.forms[0]);
        if($('#profilePicture').prop('files').length > 0){
            file = $('#profilePicture').prop('files')[0];
            formdata.append("image",file);
            $.ajax({
                url: 'queryPhoto.php',
                type: 'POST',
                data:formdata,
                processData: false,
                contentType: false,
                success: function (data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Foto actualizada',
                        text: 'Su foto ha sido actualizada'
                    })
                },
                error: function(xhr, status, error) {
                    alert(xhr.responseText);
                }
            })
        }
    }

    inviteToTeam = function(tournament_id,modality){
        getMembers(tournament_id);
        team_size=4;
        if(modality=='Duos'){
            team_size=2;
        }
        $('#exampleModalCenter').modal('toggle');
        $('#myTeamModal').modal('show');
        $('#tournament_id').val(tournament_id);
    }

    //Búsquedas
    $("#searchInput").on("keyup", function () {
        value = $('#searchInput').val();
        getGamers(value);
    });

    function getMembers(t_id){
        $.ajax({
            url:'querySelect.php',
            type:'POST',
            data:{
                members:true,
                t_id:t_id
            },
            success: function (data){
                $('#div-members').html(data);
            },error: function(xhr, status, error) {
                alert(xhr.responseText);
            }
        })
    }

    function getGamers(input){
        tournament_id = $('#tournament_id').val();
        console.log(tournament_id);
        $.ajax({
            url:'querySelect.php',
            type:'POST',
            data:{
                inputText:true,
                input:input,
                t:tournament_id
            },
            success: function (data){
                $('#gamerSearched').empty();
                $('#gamerSearched').html(data);
            },error: function(xhr, status, error) {
                alert(xhr.responseText);
            }
        })
    }

    sendInvitation = function(id){
        tournament_id = $('#tournament_id').val();
        $.ajax({
            url:'queryInsert.php',
            type:'POST',
            data:{
                sendI:true,
                id:id,
                tournament_id:tournament_id
            },
            success: function (data){
                if(data=="success"){
                    Swal.fire({
                        icon: 'success',
                        title: 'Invitación enviada'
                    })
                }else{
                    alert(data);
                }
            },error: function(xhr, status, error) {
                alert(xhr.responseText);
            }
        })
    }
});