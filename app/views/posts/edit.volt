{{ content() }}
{{ form("posts/save", "method":"post") }}

<table width="100%">
    <tr>
        <td align="left">{{ link_to("posts", "Go Back") }}</td>
        <td align="right">{{ submit_button("Save") }}</td>
    </tr>
</table>

<div align="center">
    <h1>Edit posts</h1>
</div>

<table>
    <tr>
        <td align="right">
            <label for="title">Title</label>
        </td>
        <td align="left">
            {{ text_field("title", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="content">Content</label>
        </td>
        <td align="left">
                {{ text_field("content", "type" : "date") }}
        </td>
    </tr>

    <tr>
        <td>{{ hidden_field("id") }}</td>
        <td>{{ submit_button("Save") }}</td>
    </tr>
</table>

</form>
