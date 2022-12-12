<?php
$title = 'Create LDIF for SSO';
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/sidebar.php'; ?>

<h1 class="text-3xl text-black pb-2 text-white">
    <a href="<?php echo URLROOT; ?>/homepage/dashboard" class="no-underline hover:underline">Security</a> > <b>Create LDIF for SSO</b>
</h1>

<div class="bg-gray-400 rounded-lg p-2 h-">
    <div id="editor" class="border-none bg-gray-100 rounded-md focus:ring-2" >
        <p class="text-sm text-black">dn: cn=JDDOE213213,cn=Users,dc=kccmalls,dc=com</p>
        <p class="text-sm text-black">objectclass: top</p>
        <p class="text-sm text-black">objectclass: organizationalperson</p>
        <p class="text-sm text-black">objectclass: person</p>
        <p class="text-sm text-black">objectclass: inetorgperson</p>
        <p class="text-sm text-black">objectclass: KCCOBJ</p>
        <p class="text-sm text-black">objectclass: rsimUser</p>
        <p class="text-sm text-black">givenname: JOHN</p>
        <p class="text-sm text-black">sn: DOE</p>
        <p class="text-sm text-black">cn: JDDOE213213</p>
        <p class="text-sm text-black">uid: JDDOE213213</p>
        <p class="text-sm text-black">employeenumber: 213213</p>
        <p class="text-sm text-black">mail: JDDOE213213@kccmalls.com</p>
        <p class="text-sm text-black">description: Department Store</p>
        <p class="text-sm text-black">displayname: JDDOE213213</p>
        <p class="text-sm text-black">preferredlanguage: en</p>
        <p class="text-sm text-black">userstore: rsimStoreId=2,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com</p>
        <p class="text-sm text-black">userstore: rsimStoreId=1,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com</p>
        <p class="text-sm text-black">userstore: rsimStoreId=3,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com</p>
        <p class="text-sm text-black">userstore: rsimStoreId=4,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com</p>
        <p class="text-sm text-black">userstore: rsimStoreId=5,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com</p>
        <p class="text-sm text-black">userstore: rsimStoreId=6,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com</p>
        <p class="text-sm text-black">userstore: rsimStoreId=7,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com</p>
        <p class="text-sm text-black">userstore: rsimStoreId=8,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com</p>
        <p class="text-sm text-black">userstore: rsimStoreId=9,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com</p>
        <p class="text-sm text-black">userstore: rsimStoreId=41,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com</p>
        <p class="text-sm text-black">userstore: rsimStoreId=42,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com</p>
        <p class="text-sm text-black">userstore: rsimStoreId=43,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com</p>
        <p class="text-sm text-black">userstore: rsimStoreId=45,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com</p>
        <p class="text-sm text-black">userstore: rsimStoreId=46,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com</p>
        <p class="text-sm text-black">userstore: rsimStoreId=44,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com</p>
        <p class="text-sm text-black">userstore: rsimStoreId=47,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com</p>
        <p class="text-sm text-black">userstore: rsimStoreId=48,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com</p>
        <p class="text-sm text-black">userstore: rsimStoreId=49,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com</p>
        <p class="text-sm text-black">employmentstatus: 0</p>
        <p class="text-sm text-black">ssn: 123456789</p>
        <p class="text-sm text-black">referredcountry: US</p>
        <p class="text-sm text-black">userrole: rsimRoleName=KCC Admin,cn=rsimRoles,cn=RSIM,dc=kccmalls,dc=com</p>
        <p class="text-sm text-black">homestore: rsimStoreId=2,cn=rsimStores,cn=RSIM,dc=kccmalls,dc=com</p>
        <p class="text-sm text-black">userpassword: bka87701</p>
    </div>
    <div class="flex justify-end gap-4 p-2 pt-4">
        <button class="py-2 px-4 bg-green-400 hover:bg-green-600 rounded-md">Save</button>
        <button class="py-2 px-4 bg-red-400 hover:bg-red-600 rounded-md">Cancel</button>
    </div>
</div>


<!-- Initialize Quill editor -->
<script>
    var toolbarOptions = [
  ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
  ['blockquote', 'code-block'],

  [{ 'header': 1 }, { 'header': 2 }],               // custom button values
  [{ 'list': 'ordered'}, { 'list': 'bullet' }],
  [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
  [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
  [{ 'direction': 'rtl' }],                         // text direction

  [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
  [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

  [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
  [{ 'font': [] }],
  [{ 'align': [] }],

  ['clean']                                         // remove formatting button
];

  var editor = new Quill('#editor', {
    modules: { toolbar: toolbarOptions },
    theme: 'snow',
  });
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>
