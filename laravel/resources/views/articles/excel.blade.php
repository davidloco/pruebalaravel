<table>
	<thead>
		<tr>		
			<th> Nombre</th>
			<th> Descripcion</th>
			<th> Imagen </th>	
		</tr>
	</thead>
	<tbody>		
		@foreach($articles as $article)
			<tr>				
				<td> {{ $article->name }} </td>
				<td> {{ $article->description }} </td>
				<td><img src="{{ public_path(). '/' . $article->image }}" width="40px"></td>
			</tr>
		@endforeach
	</tbody>
</table>