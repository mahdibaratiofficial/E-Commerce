<table class="font-md">
    <tbody>
        @foreach ($attriutes as $attribute)
        <tr class="stand-up">
            <th>{{ $attribute->name }}</th>
            <td>
                <p>{{ ($attribute->pivot->value) ? $attribute->pivot->value->value : 'مقداری یافت نشد' }}</p>
            </td>
        </tr>
        @endforeach 
    </tbody>
</table>
