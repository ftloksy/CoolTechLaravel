<?php $__env->startSection('content'); ?>
<!-- url('/legal') page -->
<div id="legalcontent"></div>

<!-- the legal page content is use markdown format -->
<script>
 let legalpage = `
# Legal Page

## Terms of Use

Welcome to the Cool Tech blog. 
By accessing or using this website, 
you agree to be bound by the following terms of use:

- All content on this website is for 
  informational purposes only and 
  does not constitute professional advice.
  
- Cool Tech reserves the right 
  to modify or remove content at any time without notice.
  
- Any comments, feedback, 
  or other user-generated content posted 
  on this website may be used 
  by Cool Tech for promotional purposes.
  
- Cool Tech is not responsible for any damage, 
  loss, or harm resulting from the use of this website.
  
- This website may contain links to third-party websites. 
  Cool Tech is not responsible for the content 
  or privacy policies of these websites.
  
- By submitting any personal information on this website, 
  you consent to Cool Tech's collection and use of 
  this information in accordance with our Privacy Policy.
  
## Privacy Policy

Cool Tech is committed to protecting your privacy. 
This Privacy Policy outlines the types of personal information we collect, 
how we use it, and your options for managing your information.

### Information Collection

We may collect personal information such as your name, 
email address, and website URL when you comment 
on our blog posts or subscribe to our newsletter.

### Information Use

We use personal information to:

- Respond to your inquiries or comments.
- Provide you with relevant content and promotional offers.
- Improve our website and user experience.

We will never sell or share your personal information 
with third parties without your consent, except as required by law.

### Information Management

You have the right to access, update, 
or delete your personal information 
at any time by contacting us 
at <editorchief@cooltech.com>. 

### Cookies 

We may use cookies to track user activity 
on our website and improve our content and user experience. 
You can manage your cookie preferences 
in your web browser settings.

### Changes to Policy

Cool Tech reserves the right to modify or 
update this Privacy Policy at any time. 
We encourage you to review 
this Policy regularly to stay 
informed about our information practices.

If you have any questions or concerns about 
this Legal Page or our information practices, 
please contact us at <editorchief@cooltech.com>.
`
  let html = marked.parse(legalpage);
  document.getElementById("legalcontent").innerHTML = html;
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/php/L4T10/CapstoneProjectI/resources/views/legal.blade.php ENDPATH**/ ?>