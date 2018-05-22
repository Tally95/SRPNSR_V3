
<div class="reportes">
    
    <label >REPORTES<br></label>
    <hr/>
    <form action="?c=reportes" method="POST">
        <div class="cuerpoReportes">

            <label>Parque Nacional: </label>
            <select name="parque" style="height: 20px; width: 120px; margin-left: 22px;">
                <option value="0">Todos</option>
                <option>Parque Nacional Santa Rosa</option>
                <option>Parque Nacional Guanacaste</option>
            </select>

            <label>Sector</label>
            <select name="sector" style="height: 20px; width: 120px; margin-left: 22px;">
                <option value="0">Todos</option>
                <option>Sector Murcíelago</option>
                <option>Sector Naranjo</option>
                <option>Estación Biologica Nancite</option>
                <option>Estación Biologica Maritza</option>
                <option>Estación Biologica Cacao</option>
                <option>Estación Biologica Pitalla</option>
            </select>

            <br><br>

            <label>Mes</label>
            <select name="mes"style="height: 20px; width: 120px; margin-left: 22px;">
                <option value="0">Todos</option>
                <option value="1">Enero</option>
                <option value="2">Febrero</option>
                <option value="3">Marzo</option>
                <option value="4">Abril</option>
                <option value="5">Mayo</option>
                <option value="6">Junio</option>
                <option value="7">Julio</option>
                <option value="8">Agosto</option>
                <option value="9">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
                
            </select>


            <label>Año</label>
            <select name="anno"style="height: 20px; width: 120px; margin-left: 22px;">
                <option value="0">Todos</option>
                <option  value="18">2018</option>
                <option value="17">2017</option>
                <option value="16">2016</option>
                <option value="15">2015</option>
                <option value="14">2014</option>
                <option value="13">2013</option>
                <option value="12">2012</option>
                <option value="11">2011</option>                
            </select>

            <br><br>

            <!--<button class="botonesReportes">VER REPORTE</button>-->
        </div>
        <div class="cuerpo2Reports">    
            <br>
            <br>

            <input name="a" type="submit" value="Descargar" class="botonesReportes"/>


            <!--            <a href="?c=reportes&a=generarReporte">
                            <button name="t" class="botonesReportes">EXPORTAR REPORTE</button>
                        </a>-->

            <!--<button class="botonesReportes">ENVIAR REPORTE</button>-->
            <input name="a" type="submit" value="Enviar" class="botonesReportes"/>

        </div>
    </form>

</div>