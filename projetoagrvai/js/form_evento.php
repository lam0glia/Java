<p>
	<form name="form_evento" action="cad_evento.php" method="post">
		<p>
			<label>Evento:</label><br>
			<input type="text" name="evento">
		</p>

		<p>
			<label>Prioridade:</label><br>
			<input type="radio" name="prioridade" value="Normal" checked>Normal
			<input type="radio" name="prioridade" value="Urgente">Urgente
		</p>

		<p>
			<label>Data:</label><br>
			<input type="date" name="data">
		</p>

		<p>
			<button class="btn btn-primary" type="submit">Salvar</button>
		</p>
	</form>
</p>