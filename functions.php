<?php
namespace {

    function f1() {
    }

    function f2() {
    }

}

namespace functions\ns1 {

	function f1() {
	}

	f1(); // local
	\f1(); // global
	f2(); // global
	\f2(); // global
}

namespace functions\ns2 {

	function f2() {
	}
}

namespace functions\foo\bar\baz {

	function f3() {
	}
}


namespace {
    f1(); // global
    f2(); // global
    \f1(); // global
    \f2(); // global
    \functions\ns1\f1(); // namespaced
    \functions\ns2\f2(); // namespaced
}


namespace {
    use functions\ns2;
    \f2(); // global
    f2(); // global
    \functions\ns2\f2(); // namespaced
    ns2\f2(); // namespaced
}

namespace {
    use functions\ns2 as foo;
    foo\f2(); // namespaced
}

namespace {
    use functions\foo\bar;
    bar\baz\f3(); // namespaced
}