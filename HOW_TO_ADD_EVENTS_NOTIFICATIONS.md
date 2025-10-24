# 📍 How to Add Events & Notifications - Quick Guide

## 🎯 Where to Access

### Step 1: Add Routes First

**File:** `routes/web.php`

Add these lines in the admin routes section (around line 380-400):

```php
// Website Management
Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'namespace' => 'Admin\Web'], function () {
    
    // ... existing routes ...
    
    // Upcoming Events
    Route::resource('upcoming-event', 'UpcomingEventController');
    
    // Notifications  
    Route::resource('notification-board', 'NotificationBoardController');
});
```

### Step 2: Access in Admin Panel

Once routes are added, you can access:

#### 📅 **Upcoming Events**
**URL:** `http://localhost/collegenew/college/admin/upcoming-event`

**Path in Browser:**
```
Your Site → Admin Login → Admin/upcoming-event
```

#### 🔔 **Notifications**
**URL:** `http://localhost/collegenew/college/admin/notification-board`

**Path in Browser:**
```
Your Site → Admin Login → Admin/notification-board
```

---

## ✍️ How to Add a New Event (Home Page)

1. **Go to:** `http://localhost/collegenew/college/admin/upcoming-event`

2. **Click:** "Add New" button

3. **Fill the Form:**
   - **Title:** "Annual Day Celebration 2025"
   - **Description:** Event details (optional)
   - **Event Date:** Select date from calendar
   - **Event Time:** "10:00 AM" (optional)
   - **Venue:** "Main Auditorium" (optional)
   - **Department:** Select "Home Page" or leave empty
   - **Link:** External URL (optional)
   - **Image:** Upload event poster (optional)
   - **Status:** Active
   - **Display Order:** 1

4. **Click:** "Save"

5. **View Result:** Go to your website home page and scroll down to see the event!

---

## 📢 How to Add a New Notification (Home Page)

1. **Go to:** `http://localhost/collegenew/college/admin/notification-board`

2. **Click:** "Add New" button

3. **Fill the Form:**
   - **Title:** "Exam Schedule Released"
   - **Description:** Notification details (optional)
   - **Notification Date:** Select date
   - **Department:** Select "Home Page" or leave empty
   - **Link:** External URL (optional)
   - **Document:** Upload PDF (optional)
   - **Show NEW Badge:** Check if it's new
   - **Status:** Active
   - **Display Order:** 1

4. **Click:** "Save"

5. **View Result:** Check your home page to see the notification!

---

## 🏢 How to Add Department-Specific Events

For **Department Editors** (e.g., CSE Department):

1. Go to: `/admin/upcoming-event`
2. Click: "Add New"
3. **Department:** Select "Computer Science & Engineering"
4. Fill other details
5. Click: "Save"

**Result:** This event will show only on the CSE department page, not on the home page.

---

## 🎛️ Admin Panel Features

### For Upcoming Events:
- ✅ **Add New Event**
- ✅ **Edit Event**
- ✅ **Delete Event**
- ✅ **View Details**
- ✅ **Filter by Department**
- ✅ **Active/Inactive Status**
- ✅ **Upload Images**
- ✅ **Add External Links**
- ✅ **Set Display Order**

### For Notifications:
- ✅ **Add New Notification**
- ✅ **Edit Notification**
- ✅ **Delete Notification**
- ✅ **View Details**
- ✅ **Filter by Department**
- ✅ **Active/Inactive Status**
- ✅ **Upload Documents (PDF)**
- ✅ **Add External Links**
- ✅ **Show NEW Badge**
- ✅ **Set Display Order**

---

## 📊 Database Tables

Your data is stored in:
- **Table:** `upcoming_events`
- **Table:** `notifications_board`

You can view/edit directly in database if needed, but using admin panel is recommended.

---

## 🔐 Required Permissions

If permissions are enabled, you need these permissions:

### For Events:
- `upcoming-event-view`
- `upcoming-event-create`
- `upcoming-event-edit`
- `upcoming-event-delete`

### For Notifications:
- `notification-board-view`
- `notification-board-create`
- `notification-board-edit`
- `notification-board-delete`

**Assign these to:**
- **Superadmin:** All permissions
- **Department Editors:** Only for their department

---

## 🎨 Current Status

### ✅ What's Working:
- Database tables created
- Models created
- Controllers created
- Home page display working
- Auto-scroll animation working

### ⏳ What You Need to Do:
1. **Add Routes** (in routes/web.php) - 2 lines of code
2. **Create Admin Views** (I'll create these now)
3. **Add Menu in Sidebar** (optional)

---

## 🚀 Quick Start Checklist

- [ ] Step 1: Add routes to `routes/web.php`
- [ ] Step 2: Create admin view files (I'm doing this now)
- [ ] Step 3: Access `/admin/upcoming-event` 
- [ ] Step 4: Click "Add New"
- [ ] Step 5: Fill form and save
- [ ] Step 6: Check home page!

---

## 📁 File Locations

**Controllers:**
- `app/Http/Controllers/Admin/Web/UpcomingEventController.php` ✅
- `app/Http/Controllers/Admin/Web/NotificationBoardController.php` ✅

**Models:**
- `app/Models/Web/UpcomingEvent.php` ✅
- `app/Models/Web/NotificationBoard.php` ✅

**Views (Creating Now):**
- `resources/views/admin/web/upcoming-event/index.blade.php`
- `resources/views/admin/web/upcoming-event/create.blade.php`
- `resources/views/admin/web/upcoming-event/edit.blade.php`
- `resources/views/admin/web/notification-board/index.blade.php`
- `resources/views/admin/web/notification-board/create.blade.php`
- `resources/views/admin/web/notification-board/edit.blade.php`

---

## 💡 Pro Tips

1. **For Home Page:** Leave "Department" empty or select "Home Page"
2. **For Departments:** Select specific department
3. **Display Order:** Lower numbers appear first (1, 2, 3...)
4. **NEW Badge:** Use for important notifications
5. **Status:** Use "Inactive" to temporarily hide without deleting
6. **Links:** Use for registration forms, external sites
7. **Files:** Upload images for events, PDFs for notifications

---

## 🎯 Example Data

### Example Event:
```
Title: Tech Fest 2025
Date: 2025-03-15
Time: 10:00 AM
Venue: Main Auditorium
Department: Home Page
Status: Active
Display Order: 1
```

### Example Notification:
```
Title: Registration Open for Summer Internship
Date: 2025-01-20
Department: Home Page
Show NEW: Yes
Status: Active
Display Order: 1
```

---

**Next:** I'm creating all the admin view files now so you can start adding events and notifications immediately!

---

*Last Updated: December 17, 2024*
*Status: Ready to Use (after routes are added)*

