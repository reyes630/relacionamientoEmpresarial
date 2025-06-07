<style>
    .data-container {
    max-width: 900px;
    margin: 2rem auto;
    padding: 2rem;
    background-color: #f9f9f9;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .form-title {
        text-align: center;
        color: #0b5fa4;
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 2rem;
    }

    form {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.5rem;
    }

    .form-group {
        background-color: #f1f1f1; /* Tarjetas grises claras */
        padding: 1rem;
        border-radius: 10px;
        display: flex;
        flex-direction: column;
    }

    .form-group label {
        display: block;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: #333;
    }

    .form-control {
        width: 100%;
        padding: 0.6rem 1rem;
        border: 1px solid #ccc;
        border-radius: 10px;
        font-size: 1rem;
        box-sizing: border-box;
        transition: border-color 0.2s ease;
    }

    .form-control:focus {
        outline: none;
        border-color: #0b6e99;
    }

    textarea.form-control {
        resize: vertical;
        min-height: 80px;
    }

    .btn-submit {
        background-color: #003b5c;
        color: white;
        padding: 0.7rem 1.5rem;
        font-size: 1rem;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        margin-top: 2rem;
       
    }
        /* Botón guardar */
    .button-group {
    display: flex;
    justify-content: center;
    justify-self: center; 
    grid-column: span 2;  
    }
   

    .btn-submit:hover {
    background-color: #00547d;
    }

   

    @media (max-width: 768px) {
        form {
            grid-template-columns: 1fr;
        }

        .btn-submit {
            grid-column: span 1;
        }

        .form-title {
            font-size: 1.5rem;
        }
    }
</style>

<div class="data-container ">
    <h2 class="form-title">Editar Solicitud</h2>
    <form action="/solicitud/update" method="post">
        <div class="form-group">
            <label for="idSolicitud">ID de la solicitud</label>
            <input readonly value="<?php echo $solicitud->idSolicitud ?>" type="number" id="idSolicitud" name="idSolicitud" class="form-control">
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <input type="text" value="<?php echo $solicitud->DescripcionNecesidad ?>" id="descripcion" name="Descripcion" class="form-control" maxlength="255">
        </div>
        <div class="form-group">
            <label for="fecha">Fecha de la solicitud</label>
            <input value="<?php echo $solicitud->FechaEvento ?>" type="date" id="fecha" name="FechaSolicitud" class="form-control">
        </div>
        <div class="form-group">
            <label for="cliente">Cliente</label>
            <input type="text" value="<?php echo $solicitud->NombreCliente; ?>" id="cliente" name="NombreCliente" class="form-control" maxlength="255">
        </div>
        <div class="form-group">
            <label for="servicio">Servicio</label>
            <select id="servicio" name="IdServicio" class="form-control">
                <option value="">Seleccione un servicio</option>
                <?php foreach ($servicios as $servicio): ?>
                    <option value="<?php echo $servicio->idServicio; ?>" 
                        <?php echo ($solicitud->FKtipoServicio == $servicio->idServicio) ? 'selected' : ''; ?>>
                        <?php echo $servicio->Servicio; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="tipoServicio">Tipo de Servicio</label>
            <select id="tipoServicio" name="IdTipoServicio" class="form-control">
                <option value="">Seleccione un tipo de servicio</option>
                <?php foreach ($tiposServicio as $tipoServicio): ?>
                    <option value="<?php echo $tipoServicio->idTipoServicio; ?>" 
                        <?php echo ($solicitud->FKtipoServicio == $tipoServicio->idTipoServicio) ? 'selected' : ''; ?>>
                        <?php echo $tipoServicio->TipoServicio; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="estado">Estado</label>
            <select id="estado" name="IdEstado" class="form-control">
                <option value="">Seleccione un estado</option>
                <?php foreach ($estados as $estado): ?>
                    <option value="<?php echo $estado->idEstado; ?>" <?php echo ($solicitud->FKestado == $estado->idEstado) ? 'selected' : ''; ?>>
                        <?php echo $estado->Estado; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="asignacion">Asignar solicitud</label>
            <?php
            $roles = [
                3 => 'Funcionario',
                4 => 'Instructor'
            ];
            ?>
            <select id="asignacion" name="Asignacion" class="form-control">
                <option value="">Seleccione un usuario</option>
                <?php foreach ($usuariosAsignables as $usuario): ?>
                    <option value="<?php echo $usuario->idUsuario; ?>"
                        <?php echo ($solicitud->Asignacion == $usuario->idUsuario) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($usuario->NombreUsuario); ?> (<?php echo $roles[$usuario->FKidRol]; ?>)
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
         
        <div class="form-group">
            <label for="lugar">Lugar</label>
            <input type="text" value="<?php echo htmlspecialchars($solicitud->Lugar ?? ''); ?>" id="lugar" name="Lugar" class="form-control">
        </div>
        <div class="form-group">
            <label for="municipio">Municipio</label>
            <input type="text" value="<?php echo htmlspecialchars($solicitud->Municipio ?? ''); ?>" id="municipio" name="Municipio" class="form-control">
        </div>
        <div class="form-group">
            <label for="comentarios">Comentarios</label>
            <textarea id="comentarios" name="Comentarios" class="form-control"><?php echo htmlspecialchars($solicitud->Comentarios ?? ''); ?></textarea>
        </div>
        <div class="form-group">
            <label for="observaciones">Observaciones</label>
            <textarea id="observaciones" name="Observaciones" class="form-control"><?php echo htmlspecialchars($solicitud->Observaciones ?? ''); ?></textarea>
        </div>
        
        <div class="button-group">
            <button type="submit" class="btn-submit">Guardar Cambios</button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const servicioSelect = document.getElementById('servicio');
        const tipoServicioSelect = document.getElementById('tipoServicio');

        servicioSelect.addEventListener('change', async () => {
            const servicioId = servicioSelect.value;

            // Limpiar el campo de Tipo de Servicio
            tipoServicioSelect.innerHTML = '<option value="">Seleccione un tipo de servicio</option>';

            if (servicioId) {
                try {
                    // Llamar al endpoint para obtener los tipos de servicio
                    const response = await fetch(`/tipoServicio/getTiposServicioByServicio/${servicioId}`);
                    const tiposServicio = await response.json();

                    // Agregar las opciones al campo de Tipo de Servicio
                    tiposServicio.forEach(tipo => {
                        const option = document.createElement('option');
                        option.value = tipo.idTipoServicio;
                        option.textContent = tipo.TipoServicio;
                        tipoServicioSelect.appendChild(option);
                    });
                } catch (error) {
                    console.error('Error al cargar los tipos de servicio:', error);
                }
            }
        });
    });
</script>



