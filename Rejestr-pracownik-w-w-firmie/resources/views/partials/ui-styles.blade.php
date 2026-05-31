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
</style>
