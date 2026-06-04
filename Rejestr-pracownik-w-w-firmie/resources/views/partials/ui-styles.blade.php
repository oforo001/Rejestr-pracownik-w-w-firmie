<style>
    :root {
        --ui-bg: #f3f6fb;
        --ui-surface: rgba(255, 255, 255, 0.92);
        --ui-surface-strong: #ffffff;
        --ui-text: #0f172a;
        --ui-muted: #64748b;
        --ui-border: rgba(148, 163, 184, 0.28);
        --ui-primary: #2563eb;
        --ui-primary-dark: #1d4ed8;
        --ui-success-bg: #ecfdf5;
        --ui-success-text: #065f46;
        --ui-success-border: #a7f3d0;
        --ui-error: #dc2626;
        --ui-shadow: 0 24px 60px rgba(15, 23, 42, 0.12);
    }

    *, *::before, *::after {
        box-sizing: border-box;
    }

    body.ui-body {
        margin: 0;
        color: var(--ui-text);
        font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        background:
            radial-gradient(circle at top, rgba(37, 99, 235, 0.16), transparent 36%),
            radial-gradient(circle at bottom right, rgba(14, 165, 233, 0.12), transparent 28%),
            var(--ui-bg);
    }

    .ui-auth-shell {
        min-height: 100vh;
        display: grid;
        place-items: center;
        padding: 32px 16px;
    }

    .ui-auth-card {
        width: min(100%, 460px);
        background: var(--ui-surface);
        border: 1px solid var(--ui-border);
        border-radius: 24px;
        box-shadow: var(--ui-shadow);
        padding: 28px;
        backdrop-filter: blur(16px);
    }

    .ui-brand-row {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 22px;
    }

    .ui-brand-mark {
        width: 46px;
        height: 46px;
        border-radius: 16px;
        display: grid;
        place-items: center;
        color: #fff;
        font-weight: 800;
        letter-spacing: 0.08em;
        background: linear-gradient(135deg, var(--ui-primary), #0f766e);
        box-shadow: 0 10px 24px rgba(37, 99, 235, 0.22);
    }

    .ui-brand-copy {
        display: flex;
        flex-direction: column;
        gap: 2px;
    }

    .ui-brand-copy strong {
        font-size: 0.95rem;
    }

    .ui-brand-copy span {
        font-size: 0.78rem;
        letter-spacing: 0.14em;
        text-transform: uppercase;
        color: var(--ui-muted);
    }

    .ui-auth-title {
        margin: 0;
        font-size: 1.65rem;
        line-height: 1.2;
    }

    .ui-auth-lead {
        margin: 8px 0 0;
        color: var(--ui-muted);
        font-size: 0.95rem;
        line-height: 1.5;
    }

    .ui-form {
        display: grid;
        gap: 18px;
        margin-top: 24px;
    }

    .ui-field {
        display: grid;
        gap: 8px;
    }

    .ui-label {
        font-size: 0.92rem;
        font-weight: 600;
        color: #334155;
    }

    .ui-input {
        width: 100%;
        border: 1px solid #d7dee9;
        border-radius: 14px;
        background: var(--ui-surface-strong);
        color: var(--ui-text);
        padding: 13px 15px;
        font-size: 0.98rem;
        transition: border-color 0.15s ease, box-shadow 0.15s ease, transform 0.15s ease;
    }

    .ui-input:focus {
        outline: none;
        border-color: var(--ui-primary);
        box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.12);
    }

    .ui-error {
        margin: 0;
        padding: 0;
        list-style: none;
        color: var(--ui-error);
        font-size: 0.88rem;
        line-height: 1.45;
    }

    .ui-status {
        margin-top: 16px;
        background: var(--ui-success-bg);
        color: var(--ui-success-text);
        border: 1px solid var(--ui-success-border);
        border-radius: 14px;
        padding: 12px 14px;
        font-size: 0.92rem;
        line-height: 1.5;
    }

    .ui-actions {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 14px;
        flex-wrap: wrap;
        margin-top: 6px;
    }

    .ui-actions--right {
        justify-content: flex-end;
    }

    .ui-btn {
        appearance: none;
        border: 0;
        border-radius: 14px;
        padding: 12px 18px;
        font-size: 0.92rem;
        font-weight: 700;
        line-height: 1;
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        transition: transform 0.15s ease, box-shadow 0.15s ease, background 0.15s ease;
    }

    .ui-btn:hover {
        transform: translateY(-1px);
    }

    .ui-btn-primary {
        color: #fff;
        background: linear-gradient(135deg, var(--ui-primary), var(--ui-primary-dark));
        box-shadow: 0 12px 24px rgba(37, 99, 235, 0.2);
    }

    .ui-btn-danger {
        color: #fff;
        background: linear-gradient(135deg, #dc2626, #b91c1c);
        box-shadow: 0 12px 24px rgba(220, 38, 38, 0.18);
    }

    .ui-btn-secondary {
        color: #334155;
        background: #fff;
        border: 1px solid #d7dee9;
    }

    .ui-btn-link {
        color: var(--ui-primary);
        font-weight: 600;
        text-decoration: none;
    }

    .ui-btn-link:hover {
        text-decoration: underline;
    }

    .ui-footer {
        display: flex;
        justify-content: space-between;
        gap: 12px;
        flex-wrap: wrap;
        margin-top: 20px;
        font-size: 0.92rem;
        color: var(--ui-muted);
    }

    .ui-meta {
        color: var(--ui-muted);
        font-size: 0.92rem;
    }

    .ui-panel {
        background: var(--ui-surface);
        border: 1px solid var(--ui-border);
        border-radius: 20px;
        box-shadow: var(--ui-shadow);
        padding: 24px;
        backdrop-filter: blur(16px);
    }

    .ui-panel + .ui-panel {
        margin-top: 18px;
    }

    .ui-panel-header {
        margin-bottom: 18px;
    }

    .ui-panel-header h2 {
        margin: 0;
        font-size: 1.1rem;
    }

    .ui-panel-header p {
        margin: 6px 0 0;
        color: var(--ui-muted);
        font-size: 0.92rem;
        line-height: 1.5;
    }

    .ui-dashboard {
        width: min(100%, 1280px);
        margin: 0 auto;
        padding: 1.5rem 1rem 3rem;
    }

    .ui-dashboard-grid {
        display: grid;
        gap: 1rem;
    }

    .ui-hero-card,
    .ui-surface-card {
        position: relative;
        overflow: hidden;
        border: 1px solid var(--ui-border);
        border-radius: 28px;
        background: var(--ui-surface);
        box-shadow: var(--ui-shadow);
        backdrop-filter: blur(16px);
    }

    .ui-hero-card {
        padding: 26px;
        background:
            radial-gradient(circle at top right, rgba(37, 99, 235, 0.14), transparent 32%),
            linear-gradient(180deg, rgba(255, 255, 255, 0.96), rgba(248, 250, 252, 0.9));
    }

    .ui-hero-card::after {
        content: '';
        position: absolute;
        inset: auto -70px -70px auto;
        width: 180px;
        height: 180px;
        border-radius: 999px;
        background: rgba(37, 99, 235, 0.08);
        filter: blur(4px);
        pointer-events: none;
    }

    .ui-hero-grid {
        position: relative;
        z-index: 1;
        display: grid;
        gap: 1.25rem;
    }

    .ui-kicker {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.45rem 0.8rem;
        border-radius: 999px;
        background: rgba(15, 23, 42, 0.06);
        color: #334155;
        font-size: 0.74rem;
        font-weight: 800;
        letter-spacing: 0.1em;
        text-transform: uppercase;
    }

    .ui-hero-title {
        margin: 0.7rem 0 0;
        font-size: clamp(1.65rem, 2.4vw, 2.35rem);
        line-height: 1.08;
        color: #0f172a;
    }

    .ui-hero-lead {
        margin: 0.8rem 0 0;
        max-width: 68ch;
        color: var(--ui-muted);
        font-size: 0.98rem;
        line-height: 1.65;
    }

    .ui-chip-row {
        display: flex;
        flex-wrap: wrap;
        gap: 0.65rem;
        margin-top: 1rem;
    }

    .ui-chip {
        display: inline-flex;
        align-items: center;
        gap: 0.45rem;
        padding: 0.55rem 0.8rem;
        border: 1px solid rgba(148, 163, 184, 0.22);
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.86);
        color: #334155;
        font-size: 0.86rem;
        font-weight: 600;
        text-decoration: none;
        transition: transform 0.15s ease, box-shadow 0.15s ease;
    }

    .ui-chip:hover {
        transform: translateY(-1px);
        box-shadow: 0 10px 18px rgba(15, 23, 42, 0.08);
    }

    .ui-stat-grid {
        display: grid;
        gap: 0.9rem;
        grid-template-columns: repeat(4, minmax(0, 1fr));
    }

    .ui-stat-card {
        padding: 1rem 1.1rem;
        border: 1px solid rgba(148, 163, 184, 0.22);
        border-radius: 22px;
        background: rgba(255, 255, 255, 0.92);
        box-shadow: 0 14px 30px rgba(15, 23, 42, 0.06);
    }

    .ui-stat-label {
        margin: 0;
        color: var(--ui-muted);
        font-size: 0.78rem;
        font-weight: 800;
        letter-spacing: 0.1em;
        text-transform: uppercase;
    }

    .ui-stat-value {
        margin: 0.55rem 0 0;
        color: #0f172a;
        font-size: 1.6rem;
        font-weight: 800;
        line-height: 1;
    }

    .ui-stat-note {
        margin: 0.4rem 0 0;
        color: var(--ui-muted);
        font-size: 0.88rem;
        line-height: 1.45;
    }

    .ui-split-grid {
        display: grid;
        gap: 1rem;
        grid-template-columns: minmax(0, 1.7fr) minmax(280px, 1fr);
        align-items: start;
    }

    .ui-section-card {
        padding: 1.2rem;
    }

    .ui-section-head {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .ui-section-head h3 {
        margin: 0;
        color: #0f172a;
        font-size: 1.05rem;
        line-height: 1.3;
    }

    .ui-section-head p {
        margin: 0.35rem 0 0;
        color: var(--ui-muted);
        font-size: 0.9rem;
        line-height: 1.5;
    }

    .ui-list {
        display: grid;
        gap: 0.75rem;
    }

    .ui-list-item {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 1rem;
        padding: 0.95rem 1rem;
        border: 1px solid rgba(226, 232, 240, 0.95);
        border-radius: 18px;
        background: #fff;
    }

    .ui-list-item__title {
        margin: 0;
        color: #0f172a;
        font-size: 0.95rem;
        font-weight: 700;
        line-height: 1.35;
    }

    .ui-list-item__meta {
        margin: 0.3rem 0 0;
        color: var(--ui-muted);
        font-size: 0.84rem;
        line-height: 1.45;
    }

    .ui-list-item__side {
        flex-shrink: 0;
        color: #0f172a;
        font-size: 0.88rem;
        font-weight: 700;
        text-align: right;
    }

    .ui-empty-state {
        padding: 1.2rem;
        border: 1px dashed rgba(148, 163, 184, 0.4);
        border-radius: 18px;
        background: rgba(248, 250, 252, 0.7);
        color: var(--ui-muted);
        font-size: 0.92rem;
        line-height: 1.55;
    }

    .ui-summary-grid {
        display: grid;
        gap: 0.75rem;
    }

    .ui-quick-link {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        padding: 0.95rem 1rem;
        border: 1px solid rgba(226, 232, 240, 0.95);
        border-radius: 18px;
        background: #fff;
        color: #0f172a;
        text-decoration: none;
        transition: transform 0.15s ease, box-shadow 0.15s ease;
    }

    .ui-quick-link:hover {
        transform: translateY(-1px);
        box-shadow: 0 12px 24px rgba(15, 23, 42, 0.08);
    }

    .ui-quick-link strong {
        display: block;
        font-size: 0.95rem;
        line-height: 1.35;
    }

    .ui-quick-link span {
        display: block;
        margin-top: 0.22rem;
        color: var(--ui-muted);
        font-size: 0.84rem;
        line-height: 1.45;
    }

    @media (max-width: 1024px) {
        .ui-stat-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .ui-split-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 640px) {
        .ui-dashboard {
            padding-inline: 0.75rem;
        }

        .ui-hero-card,
        .ui-section-card {
            border-radius: 22px;
            padding: 1rem;
        }

        .ui-stat-grid {
            grid-template-columns: 1fr;
        }

        .ui-list-item,
        .ui-quick-link {
            flex-direction: column;
            align-items: flex-start;
        }

        .ui-list-item__side {
            text-align: left;
        }
    }

    .ui-nav {
        position: sticky;
        top: 0;
        z-index: 30;
        border-bottom: 2px solid #aeb7c2;
        background: #edf1f5;
        box-shadow: 0 1px 0 rgba(255, 255, 255, 0.75) inset, 0 6px 16px rgba(15, 23, 42, 0.06);
    }

    .ui-nav--classic {
        font-family: Georgia, "Times New Roman", serif;
    }

    .ui-nav__shell {
        width: min(100%, 1280px);
        margin: 0 auto;
        padding: 0.85rem 1rem;
        display: flex;
        align-items: stretch;
        justify-content: space-between;
        gap: 1rem;
    }

    .ui-nav__brand {
        display: flex;
        flex-direction: column;
        justify-content: center;
        gap: 0.25rem;
        min-width: 0;
    }

    .ui-nav__brand-link {
        color: #14233a;
        font-size: 1.1rem;
        font-weight: 700;
        letter-spacing: 0.01em;
        text-decoration: none;
        white-space: nowrap;
    }

    .ui-nav__brand-link:hover {
        text-decoration: underline;
    }

    .ui-nav__brand-copy {
        display: flex;
        flex-wrap: wrap;
        gap: 0.45rem;
        color: #5b5b5b;
        font-size: 0.82rem;
        line-height: 1.2;
    }

    .ui-nav__role-label {
        font-weight: 700;
    }

    .ui-nav__section-label::before {
        content: "•";
        margin-right: 0.45rem;
        color: #8a6d3b;
    }

    .ui-nav__links {
        display: flex;
        align-items: stretch;
        gap: 0;
        border: 1px solid #9fa9b7;
        border-radius: 3px;
        overflow: hidden;
        background: #fff;
        box-shadow: 0 1px 0 rgba(255, 255, 255, 0.7) inset;
    }

    .ui-nav__tab {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 44px;
        padding: 0.55rem 1rem;
        border-right: 1px solid #c6ced9;
        color: #243447;
        font-size: 0.92rem;
        font-weight: 700;
        text-decoration: none;
        background: linear-gradient(180deg, #ffffff, #f3f5f8);
        white-space: nowrap;
    }

    .ui-nav__tab:last-child {
        border-right: 0;
    }

    .ui-nav__tab:hover {
        background: #e4e9ef;
    }

    .ui-nav__tab.is-active {
        background: linear-gradient(180deg, #4b5563, #374151);
        color: #fff;
        text-shadow: 0 1px 0 rgba(0, 0, 0, 0.2);
    }

    .ui-nav__account {
        display: flex;
        align-items: center;
        gap: 0.7rem;
        margin-left: auto;
    }

    .ui-nav__account form {
        display: flex;
    }

    .ui-nav__identity {
        display: grid;
        gap: 0.1rem;
        text-align: right;
        padding-right: 0.45rem;
        border-right: 1px solid #c6ced9;
    }

    .ui-nav__name {
        color: #14233a;
        font-size: 0.92rem;
        font-weight: 700;
        line-height: 1.2;
    }

    .ui-nav__email {
        color: #6b7280;
        font-size: 0.78rem;
        line-height: 1.2;
    }

    .ui-nav__action {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        height: 40px;
        min-height: 40px;
        padding: 0.45rem 0.8rem;
        border: 1px solid #9fa9b7;
        border-radius: 3px;
        background: #ffffff;
        color: #243447;
        font-size: 0.9rem;
        font-weight: 700;
        line-height: 1;
        text-decoration: none;
        cursor: pointer;
        box-sizing: border-box;
    }

    .ui-nav__action:hover {
        background: #eef2f6;
    }

    .ui-nav__action--muted {
        background: #f6f8fb;
    }

    .ui-nav__mobile-toggle {
        display: none;
        position: relative;
    }

    .ui-nav__mobile-toggle > summary {
        list-style: none;
    }

    .ui-nav__mobile-toggle > summary::-webkit-details-marker {
        display: none;
    }

    .ui-nav__menu-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        height: 40px;
        min-height: 40px;
        padding: 0.45rem 0.85rem;
        border: 1px solid #9fa9b7;
        border-radius: 3px;
        background: #ffffff;
        color: #243447;
        font-size: 0.9rem;
        font-weight: 700;
        line-height: 1;
        cursor: pointer;
        box-sizing: border-box;
    }

    .ui-nav__mobile-panel {
        position: absolute;
        right: 0;
        top: calc(100% + 0.55rem);
        width: min(360px, 88vw);
        border: 1px solid #9fa9b7;
        border-radius: 4px;
        background: #f8fafc;
        box-shadow: 0 18px 42px rgba(15, 23, 42, 0.18);
        padding: 0.9rem;
        display: grid;
        gap: 0.7rem;
        z-index: 40;
    }

    .ui-nav__mobile-meta {
        display: grid;
        gap: 0.2rem;
        padding-bottom: 0.6rem;
        border-bottom: 1px solid #d7dde5;
        color: #243447;
        font-size: 0.84rem;
    }

    .ui-nav__mobile-link {
        display: block;
        width: 100%;
        padding: 0.62rem 0.75rem;
        border: 1px solid #aeb8c7;
        border-radius: 3px;
        background: #fff;
        color: #243447;
        font-size: 0.9rem;
        font-weight: 700;
        text-align: left;
        text-decoration: none;
        cursor: pointer;
    }

    .ui-nav__mobile-link:hover {
        background: #eef3f8;
    }

    .ui-nav__mobile-link.is-active {
        background: #4b5563;
        border-color: #374151;
        color: #fff;
    }

    .ui-nav__mobile-link--button {
        appearance: none;
    }

    @media (max-width: 1024px) {
        .ui-nav__shell {
            flex-wrap: wrap;
        }

        .ui-nav__account {
            margin-left: 0;
        }
    }

    @media (max-width: 900px) {
        .ui-nav__links,
        .ui-nav__account > a,
        .ui-nav__account > form {
            display: none;
        }

        .ui-nav__mobile-toggle {
            display: block;
            margin-left: auto;
        }
    }
</style>
