# Web Components Documentation

This directory contains reusable Blade components for the web section of the application.

## Available Components

### 1. Breadcrumb Component

A reusable breadcrumb navigation component located at `app/View/Components/Web/Breadcrumb.php`.

#### Usage:
```blade
<x-web.breadcrumb 
    :title="'Page Title'"
    :items="[
        ['title' => 'Home', 'url' => route('home')],
        ['title' => 'Department', 'url' => route('department')],
        ['title' => 'Current Page', 'url' => null]
    ]"
    background="linear-gradient(135deg, #2c5aa0 0%, #1e3a8a 100%)"
    class="custom-class"
/>
```

#### Parameters:
- `title` (string): The main title to display
- `items` (array): Array of breadcrumb items with 'title' and 'url' keys
- `background` (string): CSS background for the breadcrumb area
- `class` (string): Additional CSS classes

### 2. Slider Component

A reusable slider component with support for multiple slides and default fallback located at `app/View/Components/Web/Slider.php`.

#### Usage:
```blade
<x-web.slider 
    :sliders="$sliders"
    :department="$department"
    default-title="Welcome"
    default-subtitle="Excellence in Engineering Education"
    default-button-text="Discover More"
    default-button-link="#content"
    class="custom-slider"
/>
```

#### Parameters:
- `sliders` (collection): Collection of slider objects
- `department` (object): Department object for dynamic content
- `default-title` (string): Default title when no sliders available
- `default-subtitle` (string): Default subtitle when no sliders available
- `default-button-text` (string): Default button text
- `default-button-link` (string): Default button link
- `class` (string): Additional CSS classes

### 3. Quick Navigation Component

A reusable quick navigation component with sidebar widget structure located at `app/View/Components/Web/QuickNavigation.php`.

#### Usage:
```blade
<x-web.quick-navigation 
    title="Details"
    :items="[
        ['title' => 'Faculty', 'url' => '/faculty'],
        ['title' => 'Infrastructure', 'url' => '/infrastructure'],
        ['title' => 'Achievements', 'url' => '/achievements']
    ]"
    class="custom-nav"
/>
```

#### Parameters:
- `title` (string): The heading title for the navigation section (default: 'Details')
- `items` (array): Array of navigation items with 'title' and 'url' keys
- `class` (string): Additional CSS classes

## Example Implementation

Here's how to use all components together in a page:

```blade
@extends('web.layouts.master')
@section('title', 'Department Page')

@section('content')
<main>
    <!-- Slider Section -->
    <x-web.slider 
        :sliders="$sliders"
        :department="$department"
        default-button-link="#department-content"
        class="department-slider"
    />

    <!-- Breadcrumb Section -->
    <x-web.breadcrumb 
        :title="$department->title"
        :items="[
            ['title' => 'Home', 'url' => route('home')],
            ['title' => 'Department', 'url' => route('department')],
            ['title' => $department->title, 'url' => null]
        ]"
    />

    <!-- Content Section -->
    <section class="project-detail" id="department-content">
        <div class="container">
            <div class="lower-content">
                <div class="row">
                    <div class="text-column col-lg-12 col-md-12 col-sm-12">
                        <!-- Quick Navigation -->
                        <x-web.quick-navigation 
                            title="Details"
                            :items="[
                                ['title' => 'Faculty', 'url' => url('/department/' . $department->slug . '/faculty')],
                                ['title' => 'Infrastructure', 'url' => url('/department/' . $department->slug . '/infrastructure')],
                                ['title' => 'Achievements', 'url' => url('/department/' . $department->slug . '/achievements')]
                            ]"
                        />

                        <!-- Page Content -->
                        <h2>{{ $department->title }}</h2>
                        <div class="inner-column">
                            <p>Department content goes here...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
```

## Benefits of Using Components

1. **Reusability**: Components can be used across multiple pages
2. **Consistency**: Ensures consistent styling and behavior
3. **Maintainability**: Changes to components affect all pages using them
4. **Clean Code**: Reduces code duplication and improves readability
5. **Flexibility**: Components accept parameters for customization

## Styling

Each component includes its own CSS styles and responsive design. The styles are automatically included when the component is used via the `@push('styles')` directive.

## JavaScript

Components that require JavaScript functionality (like the slider) automatically include the necessary scripts via the `@push('scripts')` directive.
