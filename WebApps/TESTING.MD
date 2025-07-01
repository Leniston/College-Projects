# Website testing documentation

## Manual Testing

| Area Of Test		| Description                                | Expected Results                                                | Pass / Fail |
|-----------------------|--------------------------------------------|-----------------------------------------------------------------|-------------|
|Sign Up Form		| Check email validation and required fields | Error shown for invalid email or blank fields                   | Pass	     |
|Sign Up Form  		| Successfully register with valid details   | User created in SQL, redirect to sign in page                   | Pass	     |
|Login 	       		| Incorrect login details                    | Error message given to user 	          		       | Pass	     |
|Login         		| Correct login details			     | Success message, User redirected prompted to view member books  | Pass	     |
|Logout        		| Click logout button    		     | Session destroyed, User redirect to home page                   | Pass	     |
|Product listing        | View shop as guest    		     | Products displayed with information pulled from database        | Pass	     |
|Product listing        | View Members books as guest    	     | User directed to Sign in page     			       | Pass	     |
|Product listing        | View Members books as Member(Signed in)    | Successful access to Members Books webpage 		       | Pass	     |
|Shopping cart          | Clicking add to cart button on Members and non-member books   | Books are successfully added to cart and subtotal displayed	       | Pass	     |
|Shopping cart      | Verify Update Quantity   | Increase and decreasing quantity reflects in subtotal change, Remove button removes items		       | Pass	     |
|Shopping cart      | Verify Remove Button   | Selected item is removed from the Cart		       | Pass	     |
| CRUD – Create     | Create new user account                               | Product inserted into DB                          	| Pass      |
| CRUD – Read       | Display products from DB, Display account management details                               | All products retrieved and shown, Account management reading from DB                 	| Pass      |          
| CRUD – Update     | Update account details                                   | Updates successfully applied to the User Table                              	| Pass      |          
| CRUD – Delete     | Delete Account                                        | Account deleted, user redirect, details removed from DB                           	| Pass      |     
| Sessions          | Session is destroyed on logout              | User logged out securely                          | Pass      | 


## Security / Validation checks

| Area Of Test		| Description                                | Expected Results                                                | Pass / Fail |
|-----------------------|--------------------------------------------|-----------------------------------------------------------------|-------------|
| Forms with empty fields    | Submit form without data                               | User prompted to fill field, no data processed    | Pass          |       
| Invalid Email Format      | Register with wrong email format                       | Rejected with prompt to enter valid email                | Pass           |

## Interface and Usability testing

| Area                     | Description                                      | Pass/Fail |
|--------------------------|--------------------------------------------------|------------
| Navigation               | Menu and links function correctly                | Pass          |
| Image Alt Tags           | All images have alt text                         | Pass          |
| Text Readability         | Fonts are clear, contrast is accessible          | Pass          |
| Error Messages           | Shown clearly and helpfully                      | Pass          |
