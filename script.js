const form = document.getElementById("registro-form");
const mensaje = document.getElementById("mensaje");

form.addEventListener("submit", async (e) => {
    e.preventDefault();

    if (window.location.protocol === "file:") {
        mensaje.textContent = "Abre la página con http://localhost (XAMPP), no como archivo local.";
        return;
    }

    mensaje.textContent = "Enviando...";

    try {
        const response = await fetch("insertar_usuario.php", {
            method: "POST",
            body: new FormData(form)
        });

        const text = await response.text();
        let result;

        try {
            result = JSON.parse(text);
        } catch {
            mensaje.textContent = "El servidor no devolvió JSON. ¿Están Apache y MySQL en ejecución?";
            return;
        }

        mensaje.textContent = result.message || "Error desconocido.";

        if (result.success) {
            form.reset();
        }
    } catch (error) {
        mensaje.textContent = "No se pudo contactar al servidor. Usa http://localhost y verifica que XAMPP esté activo.";
    }
});
