<template>
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top">
        <div class="container-fluid">
            <div class="navbar-wrapper">
            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
            </button>

            
            <!-- BOTÓN DE SALIDA -->
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="dropdown-item" href="" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> 
                            <i class="material-icons">exit_to_app</i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>