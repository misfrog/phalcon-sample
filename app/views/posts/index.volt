<div class="col-md-3">
    {{ link_to("posts/new", "Create posts") }}
</div>

<div class="col-md-9">
	<h2 class="page-header">Posts</h2>
	<table class="table">
	    <thead>
	        <tr>
	            <th>Id</th>
	            <th>Title</th>
	            <th>Content</th>
	         </tr>
	    </thead>
	    <tbody>
	    {% if page.items is defined %}
	    {% for post in page.items %}
	        <tr>
	            <td>{{ post.id }}</td>
	            <td>{{ post.title }}</td>
	            <td>{{ post.content }}</td>
	            <td>{{ link_to("posts/view/"~post.id, "View") }}</td>
	            <td>{{ link_to("posts/edit/"~post.id, "Edit") }}</td>
	            <td>{{ link_to("posts/delete/"~post.id, "Delete") }}</td>
	        </tr>
	    {% endfor %}
	    {% endif %}
	    </tbody>
	    <tbody>
	        <tr>
	            <td colspan="2" align="right">
	                <table align="center">
	                    <tr>
	                        <td>{{ link_to("posts/search", "First") }}</td>
	                        <td>{{ link_to("posts/search?page="~page.before, "Previous") }}</td>
	                        <td>{{ link_to("posts/search?page="~page.next, "Next") }}</td>
	                        <td>{{ link_to("posts/search?page="~page.last, "Last") }}</td>
	                        <td>{{ page.current~"/"~page.total_pages }}</td>
	                    </tr>
	                </table>
	            </td>
	        </tr>
	    <tbody>
	</table>	
</div>
