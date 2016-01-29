Thumbnail Generator Plugin for Mecha CMS
========================================

> Resize and crop an image on the fly.

#### URL Pattern

 - `/t/<width>/<path>` → proportional image resize
 - `/t/<width>/<height>/<path>` → proportional image resize and crop
 - `/t/<x>/<y>/<width>/<height>/<path>` → crop image without resize

#### Example

~~~ .no-highlight
http://localhost/t/200/path/to/image.jpg
http://localhost/t/200/200/path/to/image.jpg
http://localhost/t/30/60/200/400/path/to/image.jpg
~~~

#### Description

 - `<width>` → the image width
 - `<height>` → the image height
 - `<x>` → horizontal position from the original image corner
 - `<y>` → vertical position from the original image corner
 - `<path>` → the image path, relative to the `lot\assets` folder.