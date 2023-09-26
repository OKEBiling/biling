<?php $setsession=session::getAll()[ 'metaOKEBiling']; ?>
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo ">
        <a href="index.html" class="app-brand-link"> <span class="app-brand-logo demo">

            <img src="/assets/img/logo/logo.png" class="app-brand-logo demo" />
        </span>
 <span class="app-brand-text demo menu-text fw-bold ms-2">OKEBILING</span>

        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto"> <i class="bx menu-toggle-icon d-none d-xl-block fs-4 align-middle"></i>
 <i class="bx bx-x d-block d-xl-none bx-sm align-middle"></i>

        </a>
    </div>
    <div class="menu-divider mt-0  "></div>
    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item" data-menu ="dashboard">
            <a href="/dashboard" class="menu-link"> <i class="menu-icon tf-icons bx bx-home-circle"></i>

                <div data-i18n="Dashboards">Dashboards</div>
            </a>
        </li>
        <li class="menu-item " data-menu ="customer">
            <a href="javascript:void(0);" class="menu-link menu-toggle"> <i class="menu-icon tf-icons bx bx-user"></i>

                <div data-i18n="Users">Customer Manager</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="/customer" class="menu-link">
                        <div data-i18n="List">Data Customer</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="/customer/tagihan" class="menu-link">
                        <div data-i18n="List">Tagihan Pelanggan</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="/customer/setting" class="menu-link">
                        <div data-i18n="List">Setting</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item " data-menu ="logic">
            <a href="javascript:void(0);" class="menu-link menu-toggle"> <i class="menu-icon tf-icons bx bx-code-block"></i>

                <div data-i18n="Users">Logic Manager</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="/logic/router" class="menu-link">
                        <div data-i18n="List">Data Router</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="/logic/olt" class="menu-link">
                        <div data-i18n="List">Data OLT</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item " data-menu ="subscriptions">
            <a href="javascript:void(0);" class="menu-link menu-toggle"> <i class="menu-icon tf-icons bx bx-spreadsheet"></i>

                <div data-i18n="Users">subscriptions</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="/subscriptions" class="menu-link">
                        <div data-i18n="List">Data subscriptions</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="/subscriptions/anual" class="menu-link">
                        <div data-i18n="List">Data anual</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="/subscriptions/setting" class="menu-link">
                        <div data-i18n="List">setting</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item " data-menu ="Infra">
            <a href="javascript:void(0);" class="menu-link menu-toggle"> <i class="menu-icon tf-icons bx bxs-book-content"></i>

                <div data-i18n="Users">Infra Manager</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="/Infra/ODC" class="menu-link">
                        <div data-i18n="List">Data ODC</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="/Infra/ODP" class="menu-link">
                        <div data-i18n="List">Data ODP</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item " data-menu ="gateway">
            <a href="javascript:void(0);" class="menu-link menu-toggle"> <i class="menu-icon tf-icons bx bx-wallet-alt"></i>

                <div data-i18n="Users">Gateway Manager</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="/gateway/Payment" class="menu-link">
                        <div data-i18n="List">Payment Gateway</div>
                    </a>
                </li>
            </ul>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="/gateway/Whatsapps" class="menu-link">
                        <div data-i18n="List">Whatsapps Gateway</div>
                    </a>
                </li>
            </ul>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="/gateway/email" class="menu-link">
                        <div data-i18n="List">email Gateway</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item " data-menu ="staff">
            <a href="javascript:void(0);" class="menu-link menu-toggle"> <i class="menu-icon tf-icons bx bxs-user-detail"></i>

                <div data-i18n="Users">Staff Manager</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="/staff" class="menu-link">
                        <div data-i18n="List">User</div>
                    </a>
                </li>
            </ul>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="/staff/permission" class="menu-link">
                        <div data-i18n="List">Permission Group</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item " data-menu ="Tools">
            <a href="javascript:void(0);" class="menu-link menu-toggle"> <i class="menu-icon tf-icons bx bxs-buildings"></i>

                <div data-i18n="Users">Tools Manager</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="/Tools" class="menu-link">
                        <div data-i18n="List">Setting</div>
                    </a>
                </li>
            </ul>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="/Tools" class="menu-link">
                        <div data-i18n="List">Permission Group</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    <div class=" p-2">
        <div class="card mb-4">
            <div class="card-body"> <small class="card-text text-uppercase">Debug</small>

                <ul class="list-unstyled mb-0 mt-3 pt-1">
                    <?=isset($setsession) ? json_encode($setsession, JSON_PRETTY_PRINT) : '' ;?>
                </ul>
            </div>
        </div>
    </div>
</aside>