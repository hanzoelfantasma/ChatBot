<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="asesores"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Asesores"></x-navbars.navs.auth>
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Agregar Asesor</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2 container">
                            <form method="POST" action="{{route('asesores-store')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group input-group-outline my-3">
                                            <label class="form-label">Nombre Completo</label>
                                            <input type="text" name="nombre_completo" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group input-group-outline my-3">
                                            <label class="form-label">Celular</label>
                                            <input type="tel" name="celular" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>

</x-layout>

