<style>
    div .containerWelcome {
            width: 100%;
            display: flex;
            align-items: center;
            position: relative;
        }

        div .textWelcome {
           
            width: 80%;
            h1 {
                font-size: 96px;
                color: #04324D;
            }
            h4{
               font-size: 32px; 
                color: #39A900;
                font-weight: 100;
            }
            p{
                font-size: 16px;
                width: 500px;
                color: #9EA19C;
            }
        }

        div .imgWelcome img{
            width: 700px;
            display: flex;
            position: absolute;
            top: 20px;
            left: 600px
        }

        @media (max-width: 1200px) {
            div .containerWelcome {
                padding: 30px; 
            }

            div .textWelcome {
                width: 50%; 
                margin-top: 200px; 
            }

            div .textWelcome h1 {
                font-size: 60px; 
            }

            div .textWelcome h4 {
                font-size: 28px; 
            }

            div .textWelcome p {
                width: 90%; 
                font-size: 14px; 
            }

            div .imgWelcome img {
                margin: 0;
                width: 500px; 
                top: 230px;
                left: 420px; 
            }
        }

        @media (max-width: 768px) {
            div .containerWelcome {
                flex-direction: column;
                padding: 20px;
            }

            div .textWelcome {
                width: 100%;
                margin-top: 20px;
                margin-left: 0;
                text-align: center;
            }

            div .textWelcome h1 {
                font-size: 40px;
            }

            div .textWelcome h4 {
                font-size: 24px;
            }

            div .textWelcome p {
                width: 100%;
                font-size: 14px;
            }

            div .imgWelcome img {
                position: static;
                width: 100%;
                height: auto;
                margin-top: 20px;
            }

            
        }
        .hidden {
                display: none;
            }

</style>
<div class="data-container">
    <div class="containerWelcome">
        <div class="textWelcome">
            <h1>¡¡Bienvenidos!!</h1>
            <h4>Sistema Gestión de Relacionamiento Empresarial</h2>
                <p>En este sitio nos especializamos en ayudarte a gestionar, fortalecer y optimizar la relación entre usuarios y el Servicio Nacional de Aprendizaje. Ofrecemos herramientas avanzadas para monitorear la presencia en medios, mejorar la interacción con el público y gestionar tu reputación en línea. Nuestro objetivo es que logres una comunicación efectiva y estratégica.</p>
        </div>
        <div class="imgWelcome">
            <img src="/img/imageRelacionamiento.png" alt="Imagen Bienvenida">
        </div>
    </div>
</div>