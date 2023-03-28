<div class="row">
    <input type="hidden" name="id_asesor" value="{{$asesor[0]->id_asesor??''}}">
    <div class="col-md-6">
        <label class="form-label">Nombre Completo</label>
        <div class="input-group input-group-outline">
            <input type="text" name="nombre_completo" placeholder="Nombre Completo" value="{{$asesor[0]->nombre_completo??''}}" class="form-control" required>
        </div>
    </div>
    <div class="col-md-6">
        <label class="form-label">Celular</label>
        <div class="input-group input-group-outline">
            <input type="tel" name="celular" placeholder="Celular" value="{{$asesor[0]->celular??''}}" class="form-control" required>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 my-3">
        <label class="form-label">Número de documento</label>
        <div class="input-group input-group-outline">
            <input type="number" name="numero_documento" placeholder="Número de documento" value="{{$asesor[0]->numero_documento??''}}" class="form-control" required>
        </div>
    </div>
</div>
<button type="submit" class="btn btn-primary">{{$btn}}</button>
