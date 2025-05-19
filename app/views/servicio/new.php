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
    
    .color-picker {
        height: 40px;
        padding: 2px;
    }
    
    /* Mejora la apariencia del selector de color en diferentes navegadores */
    input[type="color"]::-webkit-color-swatch-wrapper {
        padding: 0;
    }
    
    input[type="color"]::-webkit-color-swatch {
        border: none;
        border-radius: 6px;
    }
</style>

<div class="data-container">
    <h2 class="form-header">Nuevo Servicio</h2>
    <form action="/servicio/create" method="post">
        <div class="form-group">
            <label for="Servicio">Nombre del Servicio</label>
            <input type="text" name="Servicio" id="Servicio" required maxlength="100" 
                   class="form-control" placeholder="Ingrese el nombre del servicio">
        </div>
        
        <!-- Nuevo campo de color -->
        <div class="form-group">
            <label for="Color">Color del Servicio</label>
            <input type="color" name="Color" id="Color" required 
                   class="form-control color-picker" 
                   value="<?php echo sprintf('#%06X', mt_rand(0, 0xFFFFFF)); ?>">
        </div>
        
        <div class="button-group">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="/servicio/view" class="btn btn-secondary">Volver</a>
        </div>
    </form>
</div>