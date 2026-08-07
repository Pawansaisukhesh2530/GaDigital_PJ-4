#!/bin/sh
# Nani Transformers - container health check.
# Exits 0 when the homepage responds with an HTTP 200 status, 1 otherwise.
# Uses the bundled PHP binary so no extra packages are required.
php -r 'exit((is_array($h = @get_headers("http://127.0.0.1/", 1)) && strpos($h[0], "200") !== false) ? 0 : 1);'
