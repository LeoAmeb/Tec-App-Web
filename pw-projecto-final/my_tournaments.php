<?php
include 'validate_session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis torneos</title>
</head>
<body>
<div class="container">
	<h3>Historial de torneos</h3>
    <div id="displayMyTournaments"></div>
    
	<div id="tournamentModal">
    </div>
    
    <div id="teamModal">
        <div class="modal fade" id="myTeamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Mi equipo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="my-team">
                        <div class="members d-flex" id="div-members">
                        </div>
                    </div>
                    <div class="md-form mt-0">
                        <label for="">Buscar gamers</label>
                        <input id="searchInput" class="form-control" type="text" placeholder="Buscar" aria-label="Search">
                    </div>
                    <div id="gamerSearched">
                    </div>
                    <input type="hidden" id="tournament_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
                </div>
            </div>
        </div>
	</div>
</div>	


<script src="assets/js/sweetalert2.all.min.js"></script>
<script src="assets/js/jquery-3.4.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>