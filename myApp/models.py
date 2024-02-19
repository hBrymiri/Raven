
from django.db import models
from django.db import models
from django.contrib.auth.models import User

class Post(models.Model):
    title = models.CharField(max_length=200)
    content = models.TextField()
    pub_date = models.DateTimeField('date published')

    def __str__(self):
        return self.title

class UserPreferences(models.Model):
    user = models.OneToOneField(User, on_delete=models.CASCADE)
    widget_order = models.CharField(max_length=255, default='')  # Example field, customize as needed
    theme = models.CharField(max_length=50, default='default')  # Example field for theme

    def __str__(self):
        return self.user.username
    class RecentFile(models.Model):
     user  = models.ForeignKey(User, on_delete=models.CASCADE)
    name = models.CharField(max_length=255)
    date_uploaded = models.DateTimeField(auto_now_add=True)
    storage_capacity = models.PositiveIntegerField()

    def __str__(self):
        return self.name