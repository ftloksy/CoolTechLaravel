@extends('app')

@section('content')
<!-- about us page -->
<!-- use markdown for the content -->
<div id="aboutuscontent"></div>
<script>
 let aboutuspage = `
# About Us

Cool Tech is a tech company 
that is passionate about making 
technology accessible to everyone. 
We believe that technology has 
the power to transform our lives, 
and we're committed to sharing 
our knowledge and expertise 
with our readers.

## Our Mission

Our mission is to provide high-quality, 
informative content that helps our readers 
make informed decisions about technology. 
We aim to be a trusted source of information 
on the latest tech trends, 
software and hardware releases, 
and the impact of technology on our lives.

## Our Team

Our team of tech experts has years of experience 
in the industry, 
and we're passionate about sharing 
our knowledge with others. 
From software developers to hardware enthusiasts, 
our team brings a diverse range 
of perspectives to our content.

## Contact Us

If you have any questions or feedback, 
we'd love to hear from you! 

- ***Email:*** <editorchief@cooltech.com> 
- ***Phone at:*** +44 876645989. 
- ***Address*** : Cool Tech 32 Train Hall Road Kent, K56MH4

## Join Our Community

Stay up to date with the latest tech news 
and analysis by joining our community. 
Subscribe to our newsletter, 
follow us on social media, 
and join the conversation in our comments section.

Thanks for visiting Cool Tech - 
we look forward to sharing our 
passion for technology with you!

`
  let html = marked.parse(aboutuspage);
  document.getElementById("aboutuscontent").innerHTML = html;
</script>
@endsection
