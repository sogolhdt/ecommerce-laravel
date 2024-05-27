## Ecommerce Project
this is a laravel backend project for the 1ta100 company's interview. 

The project contains of two sections:

-Products : defining new products and sending email to the manangement when it's done

-Shopping cart : adding and removing  products to the cart

the projects works both when user is logged in and logged out, If they're logged-in, the cart information is gonna store in the database which makes it maitainable after logging out and logging back in

if there's no user logged-in, the cart's data will store in the session and it  still maintains after each browser refresh,
and at last, if the user logs in, the cart related data from the session will transfer to the user's cart so they won't lose the products they have selected before logging in.
