# rav/urls.py
from django.contrib import admin
from django.urls import include, path
from rav.views import home
from django.urls import path
from .views import user_preferences

urlpatterns = [
    path('admin/', admin.site.urls),
    path('myapp/', include('myapp.urls')),
    path('', home),2 ,
    path('user/preferences/', user_preferences, name='user_preferences'),
    
]
