
<?php 
$page_title= "Kal code";
include('includes/header.php');
include('includes/navbar.php');
include('authentication.php');

?>







<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
        <title>Kalender</title>
    </head>
    <body>

    <!-- Add Modal -->
        <div class="modal fade" id="Event_AddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ereignis hinzufügen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="row p-2">
                            <div class="col-md-12 p-2">
                                <div class="error-message">

                                </div>
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="">Datum</label>
                                <input type="date" class="form-control event_date">
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="">Bezeichnung</label>
                                <input type="text" class="form-control event_name">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-6 p-2">
                                <label for="editReminder">Erinnerung</label>
                                <select class="form-control event_period">
                                    <option value="" disabled selected>bitte auswählen</option>
                                    <option value="1 tag">1 tag</option>
                                    <option value="2 tage">2 tage</option>
                                    <option value="4 tage">4 tage</option>
                                    <option value="1 woche">1 woche</option>
                                    <option value="2 wochen">2 wochen</option>
                                </select>
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="">Email</label>
                                <input type="email" class="form-control event_email">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Schließen</button>
                        <button type="button" class="btn btn-primary event_add_ajax">Speichern</button>
                    </div>
                </div>
            </div>
        </div>


    <!-- Edit Modal -->
    <div class="modal fade" id="EventEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bearbeiten Ihre Veranstaltung</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="row p-2">
                            <input type="hidden" id="id_edit">

                            <div class="col-md-12 p-2">
                                <div class="error-message-update">

                                </div>
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="">Datum</label>
                                <input type="date" id="edit_date" class="form-control">
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="">Bezeichnung</label>
                                <input type="text" id="edit_name" class="form-control">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-6 p-2">
                                <label for="editReminder">Erinnerung</label>
                                <select id="edit_period" class="form-control">
                                    <option value="" disabled selected>bitte auswählen</option>
                                    <option value="1 tag">1 tag</option>
                                    <option value="2 tage">2 tage</option>
                                    <option value="4 tage">4 tage</option>
                                    <option value="1 woche">1 woche</option>
                                    <option value="2 wochen">2 wochen</option>
                                </select>
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="">Email</label>
                                <input type="email" id="edit_email" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Schließen</button>
                        <button type="button" class="btn btn-primary event_update_ajax">aktualisieren</button>
                    </div>
                </div>
            </div>
        </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="EventDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Löschen Ihre Veranstaltung</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="row p-2">
                            <input type="hidden" id="id_delete">

                            <div class="col-md-12 p-2">
                                <div class="error-message-update">
                                    <h1>Löschen bestätigen</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Schließen</button>
                        <button type="button" class="btn btn-danger event_delete_ajax">löschen</button>
                    </div>
                </div>
            </div>
        </div>

    <!-- View Modal -->
        <div class="modal fade" id="EventViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detailansicht des Ereignisses</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <!-- <h4 class="id_view"></h4> -->
                        <hr>
                        <p>Datum</p>
                        <h4 class="date_view"></h4>
                        <hr>
                        <p>Bezeichnung</p>
                        <h4 class="name_view"></h4>
                        <hr>
                        <p>Erinnerung</p>
                        <h4 class="period_view"></h4>
                        <hr>
                        <p>Email</p>
                        <h4 class="email_view"></h4>
                        <hr>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Schließen</button>
                </div>
                </div>
            </div>
        </div>








        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                Ihren Kalender
                                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#Event_AddModal">
                                    Add
                                </button>
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="message-show">

                            </div>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <!-- <th>ID</th> -->
                                        <th>Datum</th>
                                        <th>Bezeichnung</th>
                                        <th>Erinnerung</th>
                                        <th>Email</th>
                                        <th>Aktion</th>
                                    </tr>
                                </thead>
                                <tbody class="eventdata">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>





        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

        <script>
            $(document).ready(function () {
                    getdata();

                    // This should just show the modal
                    $(document).on("click", ".delete_btn", function () {
                        var stud_id = $(this).closest('tr').find('.stud_id').text();
                        $('#id_delete').val(stud_id);
                        $('#EventDeleteModal').modal('show');
                    });

                    // Perform deletion only after confirmation in the modal
                    $('.event_delete_ajax').click(function () {
                        var stud_id = $('#id_delete').val();

                        $.ajax({
                            type: "POST",
                            url: "fetchcode.php",
                            data: {
                                'checking_delete': true,
                                'stud_id': stud_id,
                            },
                            success: function (response) {
                                $('#EventDeleteModal').modal('hide');
                                $('.message-show').append('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Erfolg</strong> ' + response + '.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                                $('.eventdata').html("");
                                getdata();
                            }
                        });
                    });

                    $(document).on("click", ".edit_btn", function () {

                        var stud_id = $(this).closest('tr').find('.stud_id').text();
                        // alert(stud_id);

                        $.ajax({
                            type: "POST",
                            url: "fetchcode.php",
                            data: {
                                'checking_edit': true,
                                'stud_id': stud_id,
                            },
                            success: function (response) {
                                // console.log(response);
                                $.each(response, function (key, studedit) { 
                                        // console.log(studview['fname']);
                                    $('#id_edit').val(studedit['id']);
                                    $('#edit_date').val(studedit['event_date']);
                                    $('#edit_name').val(studedit['event_name']);
                                    $('#edit_period').val(studedit['event_period']);
                                    $('#edit_email').val(studedit['event_email']);
                                    });
                                $('#EventEditModal').modal('show');
                            }
                        });
                    });

                    $(document).on("click",".viewbtn",function(){
                        //alert("Hello");
                        var stud_id = $(this).closest('tr').find('.stud_id').text();
                        // alert(stud_id);

                        $.ajax({
                            type: "POST",
                            url: "fetchcode.php",
                            data: {
                                'checking_view': true,
                                'stud_id': stud_id,
                            },
                            success: function (response) {
                                // console.log(response);
                                $.each(response, function (key, studview) { 
                                    $('.id_view').text(studview['id']);
                                    $('.date_view').text(studview['event_date']);
                                    $('.name_view').text(studview['event_name']);
                                    $('.period_view').text(studview['event_period']);
                                    $('.email_view').text(studview['event_email']);
                                });
                                $('#EventViewModal').modal('show');
                            }
                        });
                    });

                    $('.event_add_ajax').click(function (e) { 
                        e.preventDefault();

                        var date = $('.event_date').val();
                        var name = $('.event_name').val();
                        var period = $('.event_period').val();
                        var email = $('.event_email').val();

                        if(date != '' & name !='' & period !='' & email !='')
                        {
                            $.ajax({
                            type: "POST",
                            url: "fetchcode.php",
                            data: {
                                'checking_add': true,
                                'event_date': date,
                                'event_name': name,
                                'event_period': period,
                                'event_email': email,
                                },
                                success: function (response) {
                                    //console.log(response);
                                    $('#Event_AddModal').modal('hide');
                                    $('.message-show').append('\
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">\
                                            <strong>Erfolg</strong> '+response+'.\
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">\
                                                <span aria-hidden="true">&times;</span>\
                                            </button>\
                                        </div>\
                                    ');
                                    $('.eventdata').html("");
                                    getdata();
                                    $('.event_date').val();
                                    $('.event_name').val();
                                    $('.event_period').val();
                                    $('.event_email').val();
                                }
                            });
                        }   
                        else
                        {
                            $('.error-message').append('\
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">\
                                <strong>Fehler</strong> Bitte füllen Sie alle Felder aus.\
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">\
                                    <span aria-hidden="true">&times;</span>\
                                </button>\
                            </div>\
                            ');
                        }
                    }); 

                    $('.event_update_ajax').click(function (e) { 
                        e.preventDefault();
                        var stud_id = $('#id_edit').val();
                        var date = $('#edit_date').val();
                        var name = $('#edit_name').val();
                        var period = $('#edit_period').val();
                        var email = $('#edit_email').val();

                        if(date != '' & name !='' & period !='' & email !='')
                        {
                            $.ajax({
                            type: "POST",
                            url: "fetchcode.php",
                            data: {
                                'checking_update': true,
                                'stud_id': stud_id,
                                'event_date': date,
                                'event_name': name,
                                'event_period': period,
                                'event_email': email,

                                },
                                success: function (response) {
                                    //console.log(response);
                                    $('#EventEditModal').modal('hide');
                                    $('.message-show').append('\
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">\
                                            <strong>Erfolg</strong> '+response+'.\
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">\
                                                <span aria-hidden="true">&times;</span>\
                                            </button>\
                                        </div>\
                                    ');
                                    $('.eventdata').html("");
                                    getdata();
                                }
                            });
                    
                        }   
                        else
                        {
                            $('.error-message-update').append('\
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">\
                                <strong>Fehler</strong> Bitte füllen Sie alle Felder aus.\
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">\
                                    <span aria-hidden="true">&times;</span>\
                                </button>\
                            </div>\
                            ');
                        }
                    }); 

                });

                function getdata() {
                        $.ajax({
                            type: "GET",
                            url: "fetch.php",
                            success: function (response) {
                                $.each(response, function (key, value) { 
                                    $('.eventdata').append('<tr>'+
                                            '<td style="display:none;" class="stud_id">'+value['id']+'</td>'+
                                            '<td>'+value['event_date']+'</td>'+
                                            '<td>'+value['event_name']+'</td>'+
                                            '<td>'+value['event_period']+'</td>'+
                                            '<td>'+value['event_email']+'</td>'+
                                            '<td>'+
                                                '<a href="#" class="badge btn-info viewbtn p-2 m-2">VIEW</a>'+
                                                '<a href="#" class="badge btn-primary edit_btn p-2 m-2">EDIT</a>'+
                                                '<a href="#" class="badge btn-danger delete_btn p-2 m-2">Delete</a>'+
                                            '</td>'+
                                        '</tr>');
                                });
                            }
                        });
                    }
        </script>
    </body>
</html>
