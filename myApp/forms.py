# forms.py
from django import forms

class UserPreferencesForm(forms.ModelForm):
    class Meta:
        model = UserPreferences
        fields = ['widget_order', 'theme']  # Include all fields you want users to customize

 # for customizing users homescreen 