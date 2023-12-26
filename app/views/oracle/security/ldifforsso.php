<?php
$title = 'Create LDIF for SSO';
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/inc/sidebar.php'; ?>

<h1 class="text-3xl text-black mb-5 text-white">
    <a href="<?php echo URLROOT; ?>/homepages/index/<?php echo $_SESSION['SecurityDB']; ?>" class="no-underline hover:underline">Security</a> > <b>Create LDIF for SSO</b>
</h1>

<div class="bg-gray-400 rounded-lg p-2 h-fit">
    <form action="<?php echo URLROOT; ?>/securities/download/<?php echo $_SESSION['SecurityDB']; ?>" method="POST">
        <div id="editor" class="bg-white rounded-md focus:ring-6 focus:ring-blue-400">
            <?php
            $count = 0;
            foreach (new SplFileObject('../public/ldifs/sample.ldif') as $line) {
            ?>
                <p><?php echo str_replace('>', '&gt;', str_replace('<', '&lt;', $line));?></p>

            <?php
                $count++;
            }
            ?>
        </div>
        <div class="flex justify-end gap-4 p-2 pt-4">
            <input id="contents" class="hidden" name="contents"/>
            <button onclick="save()" type="submit" class="py-2 px-4 text-white bg-green-400 hover:bg-green-600 rounded-md">Save</button>
    </form>
</div>
</div>

<script>
function save(){
    var contents = "";
        document.querySelectorAll('p').forEach(p=>{
            contents += p.textContent+'\\n';
        })
        document.getElementById("contents").value = contents;
    }
</script>


<!-- Initialize Quill editor -->
<script>
    var toolbarOptions = [
        ['bold', 'italic', 'underline', 'strike'], // toggled buttons
        ['blockquote', 'code-block'],

        [{
            'header': 1
        }, {
            'header': 2
        }], // custom button values
        [{
            'list': 'ordered'
        }, {
            'list': 'bullet'
        }],
        [{
            'script': 'sub'
        }, {
            'script': 'super'
        }], // superscript/subscript
        [{
            'indent': '-1'
        }, {
            'indent': '+1'
        }], // outdent/indent
        [{
            'direction': 'rtl'
        }], // text direction

        [{
            'size': ['small', false, 'large', 'huge']
        }], // custom dropdown
        [{
            'header': [1, 2, 3, 4, 5, 6, false]
        }],

        [{
            'color': []
        }, {
            'background': []
        }], // dropdown with defaults from theme
        [{
            'font': []
        }],
        [{
            'align': []
        }],

        ['clean'] // remove formatting button
    ];

    var editor = new Quill('#editor', {
        modules: {
            toolbar: toolbarOptions,
        },
        theme: 'snow',
    });
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>