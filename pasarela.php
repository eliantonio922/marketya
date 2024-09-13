<form action="index.php?modulo=factura" method="post" id="payment-form">
    <table class="table table-striped table-inverse" id="tablaPasarela">
        <thead class="thead-inverse">
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <div class="form-row">
        <h4 class="mt3">Datos de su tarjeta</h4>
        <div id="card-element" class="form-control">
            <!-- A Stripe Element will be inserted here. -->
        </div>

        <!-- Used to display form errors. -->
        <div id="card-errors" role="alert"></div>
    </div>
    <div class="mt-3">
        <h4>Terminos y condiciones</h4>
        <p>1. Aceptación de Términos: Al utilizar nuestros servicios, aceptas cumplir con estos términos y condiciones. <br>

2. Uso del Servicio: El servicio debe utilizarse solo para fines legales. Queda prohibido el uso para actividades fraudulentas o dañinas.<br>

3. Responsabilidad: No nos hacemos responsables por cualquier daño directo o indirecto derivado del uso de nuestro servicio.<br>

4. Propiedad Intelectual: Todos los derechos de propiedad intelectual relacionados con el servicio pertenecen a nosotros o a nuestros licenciantes.<br>

5. Modificaciones: Nos reservamos el derecho de modificar estos términos en cualquier momento. Las modificaciones entrarán en vigor al ser publicadas.<br>

6. Ley Aplicable: Estos términos se rigen por las leyes de Argentina. Cualquier disputa será resuelta en los tribunales competentes de Argentina.<br>

7. Contacto: Para cualquier consulta o reclamación, contáctanos en marketya@gmail.com.</p>
        <div class="form-check">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="" id="" value="checkedValue" checked>
            Acepto los terminos y condiciones
          </label>
        </div>
    </div>
    <div class="mt-3">
        <a class="btn btn-warning" href="index.php?modulo=envio" role="button">Ir a envio</a>
        <button type="submit" class="btn btn-primary float-right">Pagar</button>
    </div>
</form>
