# myapp/views.py
from django.shortcuts import render, redirect
from .forms import UserPreferencesForm
from .models import UserPreferences
from django.contrib.auth.decorators import login_required
from datetime import datetime


def user_preferences(request):
    if request.method == 'POST':
        form = UserPreferencesForm(request.POST)
        if form.is_valid():
            # Save the preferences for the current user
            preferences = form.save(commit=False)
            preferences.user = request.user
            preferences.save()
            return redirect('home')  # Redirect to the Home Screen
    else:
        form = UserPreferencesForm()

    return render(request, 'user_preferences.html', {'form': form})


def home_screen(request):
    # Retrieve user preferences
    user_preferences = UserPreferences.objects.get(user=request.user)

    # Use user preferences to customize the Home Screen
    widget_order = user_preferences.widget_order
    theme = user_preferences.theme

    # Render the Home Screen template with the customized elements
    return render(request, 'home_screen.html', {'widget_order': widget_order, 'theme': theme})


def get_recent_files(user):
    # Implementation of get_recent_files function
    # Example: Assuming each file has 'date_added' and 'size' attributes
    files = [
        {'name': 'file1.txt', 'date_added': datetime(2023, 1, 1), 'size': 1024},
        {'name': 'file2.txt', 'date_added': datetime(2023, 1, 2), 'size': 2048},
        # ... (populate the list with your actual file data)
    ]
    return sorted(files, key=lambda x: x['date_added'], reverse=True)

@login_required
def file_view(request):
    # Retrieve the user's recent file storage data
    recent_files = get_recent_files(request.user)

    context = {
        'recent_files': recent_files,
    }

    return render(request, 'myapp/file.html', context)