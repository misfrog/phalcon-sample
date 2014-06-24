{{ content() }}
{{ form("comments/save", "method":"post") }}

<table width="100%">
    <tr>
        <td align="left">{{ link_to("comments", "Go Back") }}</td>
        <td align="right">{{ submit_button("Save") }}</td>
    </tr>
</table>

<div align="center">
    <h1>Edit comments</h1>
</div>

<table>
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
        <td>{{ hidden_field("id") }}</td>
        <td>{{ submit_button("Save") }}</td>
    </tr>
</table>

</form>
