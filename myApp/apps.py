from django.apps import AppConfig

from django.shortcuts import render

def my_view(request):
    context = {
        'message': 'Hello from Django!'
    }
    return render(request, 'your_app_name/my_template.html', context)

class BlogConfig(AppConfig):
    default_auto_field = 'django.db.models.BigAutoField'
    name = 'blog'
