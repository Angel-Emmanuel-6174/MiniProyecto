const form = document.getElementById("registro-form");
const mensaje = document.getElementById("mensaje");

form.addEventListener("submit", async (e) => {
    e.preventDefault();

    mensaje.textContent = "Enviando...";

    try {
        const response = await fetch("insertar_usuario.php", {
            method: "POST",
            body: new FormData(form)
        });

        const result = await response.json();

        mensaje.textContent = result.message;

        if (result.success) {
            form.reset();
        }
    } catch (error) {
        mensaje.textContent = "Error de conexión con el servidor.";
    }
});
