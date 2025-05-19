<style>
    .data-container {
        max-width: 500px;
        margin: 30px auto;
        padding: 25px;
        background-color: #ffffff;
        border-radius: 12px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
    }

    .form-header {
        text-align: center;
        margin-bottom: 25px;
        color: #444;
        font-size: 1.5rem;
        font-weight: 500;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        color: #555;
        font-size: 0.9rem;
        margin-bottom: 8px;
        font-weight: 500;
    }

    .form-control {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #4361ee;
        box-shadow: 0 0 0 2px rgba(67, 97, 238, 0.1);
        outline: none;
    }

    .color-group {
        display: flex;
        align-items: center;
        background: #f8f9fa;
        padding: 10px;
        border-radius: 8px;
        border: 1px solid #e0e0e0;
    }

    .color-input {
        height: 40px;
        width: 100px;
        padding: 2px;
        cursor: pointer;
        border: none;
        background: none;
    }

    .color-preview {
        width: 35px;
        height: 35px;
        border-radius: 8px;
        margin-left: 15px;
        border: 2px solid #fff;
        box-shadow: 0 0 5px rgba(0,0,0,0.1);
    }

    .button-group {
        display: flex;
        gap: 10px;
        margin-top: 25px;
    }

    .btn {
        flex: 1;
        padding: 12px;
        border: none;
        border-radius: 8px;
        font-size: 0.95rem;
        cursor: pointer;
        transition: all 0.3s ease;
        text-align: center;
        text-decoration: none;
    }

    .btn-primary {
        background-color: #4361ee;
        color: white;
    }

    .btn-secondary {
        background-color: #e9ecef;
        color: #444;
    }

    .btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
</style>

<div class="data-container">
    <h2 class="form-header">Nuevo Tipo de Servicio</h2>
    <form action="/tipoServicio/create" method="post">
        <div class="form-group">
            <label for="TipoServicio">Nombre del Tipo de Servicio</label>
            <input type="text" name="TipoServicio" required maxlength="45" class="form-control" placeholder="Ingrese el nombre del servicio">
        </div>

        <div class="form-group">
            <label for="FKidServicio">Servicio Principal</label>
            <select name="FKidServicio" required class="form-control">
                <option value="">Seleccione un servicio</option>
                <?php foreach($servicios as $servicio): ?>
                    <option value="<?php echo $servicio->idServicio ?>"><?php echo $servicio->Servicio ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="button-group">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="/tipoServicio/view" class="btn btn-secondary">Volver</a>
        </div>
    </form>
</div>

<script>
    const colorInput = document.getElementById('ColorServicio');
    const colorPreview = document.getElementById('colorPreview');

    // Inicializar el preview
    colorPreview.style.backgroundColor = colorInput.value;

    // Actualizar el preview cuando cambie el color
    colorInput.addEventListener('input', (e) => {
        colorPreview.style.backgroundColor = e.target.value;
    });
</script>