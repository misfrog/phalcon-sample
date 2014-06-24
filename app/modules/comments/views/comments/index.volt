
{{ content() }}

<div align="right">
    {{ link_to("comments/new", "Create comments") }}
</div>

{{ form("comments/search", "method":"post", "autocomplete" : "off") }}

<div align="center">
    <h1>Search comments</h1>
</div>

<table>
    <tr>
        <td align="right">
            <label for="id">Id</label>
        </td>
        <td align="left">
            {{ text_field("id", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="model">Model</label>
        </td>
        <td align="left">
            {{ text_field("model", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="model_id">Model</label>
        </td>
        <td align="left">
            {{ text_field("model_id", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="body">Body</label>
        </td>
        <td align="left">
                {{ text_field("body", "type" : "date") }}
        </td>
    </tr>

    <tr>
        <td></td>
        <td>{{ submit_button("Search") }}</td>
    </tr>
</table>

</form>
