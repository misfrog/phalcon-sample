<div class="col-md-3">
	{{ link_to("posts/new", "Create posts") }}
</div>

<div class="col-md-9">
	<h2 class="page-header">{{ post.title }}</h2>
	<p>
		{{ post.content }}
	</p>

	<hr />
	
	{% for comment in comments %}
		{{ comment.body}}
		<br />
	{% endfor %}

	{{ form("comments/comments/create", "method":"post") }}
		<input type="hidden" name="model" value="Posts">
		<input type="hidden" name="model_id" value="{{ post.id }}">
		{{ text_field("body", "type" : "date") }}
		{{ submit_button("Comment") }}
	</form>

</div>
