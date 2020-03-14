<table>
	<thead>
		<tr>		
			<th> Nombre</th>
			<th> Descripcion</th>
			<th> Imagen </th>	
		</tr>
	</thead>
	<tbody>		
		@foreach($categories as $category)
			<tr>				
				<td> {{ $category->name }} </td>
				<td> {{ $category->description }} </td>
				<td></td>
			</tr>
		@endforeach
	</tbody>
</table>